<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Auth;

use App\User;
use App\Admin;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\Token;

class ChatController extends Controller
{

    public function chat_all_user()
    {
        if(auth()->guard('admin')->user()->type == 'department_manager' || auth()->guard('admin')->user()->type == 'department_employee'){
            $chatsIDs = Chat::where('category_id', auth()->guard('admin')->user()->category_id)->pluck('id');
        }

        elseif(auth()->guard('admin')->user()->type == 'admin'){
            $chatsIDs = Chat::where('user2', 0)->pluck('id');
        }
    
        $usersChat = ChatMessage::whereIn('chat_id', $chatsIDs)->groupBy('chat_id')->latest()->get();
        return view('admin.chatting.users', ['usersChat' => $usersChat]);
    }


    public function staff_chat_all_user()
    {
        
        $checkUsers = Admin::where('category_id', auth()->guard('admin')->user()->category_id)->where('type', 'department_employee')->pluck('id')->toArray();
        
        foreach($checkUsers as $one){
            $checkChat = Chat::where('user1', auth()->guard('admin')->user()->id)->where('user2', $one)->where('emp_chat', 'yes')->first();
            if(!$checkChat){
                $chat = new Chat();
                $chat->user1 = auth()->guard('admin')->user()->id;
                $chat->user2 = $one;
                $chat->emp_chat = 'yes';
                $chat->save();
            }
        }
        
        $usersChat = Chat::where('user1', auth()->guard('admin')->user()->id)->get();

     
        
        return view('admin.chatting.staff_chat', ['usersChat' => $usersChat]);
    }



    public function new_message(Request $request, $chat_id)
    {
        
        $chat = Chat::findOrFail($chat_id);

        ChatMessage::query()->where('chat_id', $chat_id)->update(['read_at' => 1]);
        $all_chat_this_user = ChatMessage::where('chat_id', $chat_id)->get();

        return view('admin.chatting.message', ['chat' => $chat, 'all_chat_this_user' => $all_chat_this_user, 'chat_id' => $chat_id]);
    }



    public function staff_chat_new_message(Request $request, $chat_id)
    {
        
        $chat = Chat::findOrFail($chat_id);

        ChatMessage::query()->where('chat_id', $chat_id)->update(['read_at' => 1]);
        $all_chat_this_user = ChatMessage::where('chat_id', $chat_id)->get();

        return view('admin.chatting.staff_message', ['chat' => $chat, 'all_chat_this_user' => $all_chat_this_user, 'chat_id' => $chat_id]);
    }
    
    
    public function department_new_message(Request $request)
    {
        
        $chat = Chat::where('user2', auth()->guard('admin')->user()->id)->where('emp_chat', 'yes')->first();
        
        
        if(!$chat){
            
            $checkManager = Admin::where('category_id', auth()->guard('admin')->user()->category_id)->where('type', 'department_manager')->first();
            if($checkManager){
                $chat = new Chat();
                $chat->user1 = $checkManager->id;
                $chat->user2 = auth()->guard('admin')->user()->id;
                $chat->emp_chat = 'yes';
                $chat->save(); 
            }else{
                return back()->with('status', 'لا يمكن إنشاء محادثة مع رئيس القسم, حيث لم يحدد بعد');
            }
             
        }
        
        ChatMessage::query()->where('chat_id', $chat->id)->update(['read_at' => 1]);
        $all_chat_this_user = ChatMessage::where('chat_id', $chat->id)->get();

        return view('admin.chatting.department_message', ['chat' => $chat, 'all_chat_this_user' => $all_chat_this_user, 'chat_id' => $chat->id]);
    }
    
    
    

    public function new_message_admin(Request $request)
    {
        $chat = new ChatMessage();
        $chat->chat_id = $request->chat_id;
        $chat->sender_id = 0;
        $chat->message = $request->response;
        $chat->save();
        return back()->with('status', __('cp.success'));
    }


    public function staff_chat_new_message_admin (Request $request)
    {
        $chat = new ChatMessage();
        $chat->chat_id = $request->chat_id;
        $chat->sender_id = auth()->guard('admin')->user()->id;
        $chat->message = $request->response;
        $chat->save();
        return back()->with('status', __('cp.success'));
    }
    
    
    public function department_new_message_admin(Request $request)
    {
        $chat = new ChatMessage();
        $chat->chat_id = $request->chat_id;
        $chat->sender_id = auth()->guard('admin')->user()->id;
        $chat->message = $request->response;
        $chat->save();
        return back()->with('status', __('cp.success'));
    }
    


}