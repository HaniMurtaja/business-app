<?php

namespace App\Http\Controllers\WEB\Admin;


use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Contact;
use App\Models\Careers;
use App\Models\Language;
use App\Models\Setting;
use Mail;


use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->settings = Setting::query()->first();
        view()->share(['settings' => $this->settings]);
    }


    public function index(Request $request)
    {
        $items = Contact::query();

        if ($request->has('email')) {
                $items->where('email', 'like', '%' . $request->get('email') . '%');
        }


        if ($request->has('mobile')) {
                $items->where('mobile', 'like', '%' . $request->get('mobile') . '%');
        }


        if ($request->get('from_date') && $request->get('to_date')) {
            $items->whereDate('updated_at', '>=', Carbon::parse($request->get('from_date')));
            $items->whereDate('updated_at', '<=', Carbon::parse($request->get('to_date')));
        }


        $items = $items->latest()->paginate($this->settings->rows_pagination_count);
        return view('admin.cp.contacts.home', compact('items'));

    }



    public function viewMessage($id)
    {
        Contact::query()->where('id', $id)->update(['read' => 1]);
        $item = Contact::query()->findOrFail($id);
        return view('admin.cp.contacts.message', compact('item'));
    }
    


    public function destroy($id)
    {
        $item = Contact::query()->findOrFail($id);
        if ($item) {
            Contact::query()->where('id', $id)->delete();
            return "success";
        }
        return "fail";
    }


    
    public function addReplay(Request $request)
    {

        $user_id =  $request->user_id;
        $replay  =  $request->replay;

        $message =  $replay;

        $item = Contact::query()->findOrFail($request->id);
        $item->replay = $replay;
        $item->save();

        $subject = "Replay From " . $this->settings->title;
        $item->replay = $message;
                
        $blade_data = array(
            'subject'=> $subject,
            'item' => $item,
        );
            
            $email_data = array(
                'from' => env('MAIL_FROM_ADDRESS'),
                'fromName' => env('MAIL_FROM_NAME'),
                'to' => [$item->email]);
            try{
                Mail::send('emails.replayMessage', $blade_data, function ($message) use ($email_data, $subject) {
                    $message->to($email_data['to'])
                        ->subject($subject)
                        ->replyTo($email_data['from'], $email_data['fromName'])
                        ->from($email_data['from'],$email_data['fromName']);
                });
            }    
                    
            catch(Exception $e) {
                // do any thing
            }


        return redirect()->route('admin.contact.index')->with('status', __('cp.create'));

    }




}
