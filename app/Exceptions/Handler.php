<?php

namespace App\Exceptions;

use Throwable;
use Request;
use Response;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Throwable $exception
     * @return void
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }



    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
           if($request->expectsJson()){
                $message = __('api.not_found');
                return response()->json(['status' => false, 'code' => 200, 'message' => $message]);  
           }
           return redirect()->route('notFound');

        }
        return parent::render($request, $exception);
    }

    

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Throwable $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if($request->ajax()){

        }
        if ($request->expectsJson()) {
              return mainResponse(false, 'ليس لديك صلاحية للعملية', [], 401,'','');
            
                }
        if (in_array('admin', explode('/', request()->url()))) {
            return redirect('/admin/login');
        }elseif (in_array('subadmin', explode('/', request()->url()))) {
            return redirect('subadmin/login');
        }else{
            return redirect('/login');
        }
        return mainResponse(false, 'api.unauthenticated', [], 401,'','');

        $guards = array_get($exception->guards() ,0);

        switch ($guards) {
            case 'admin':
                $login = 'admin.login';
                break;

            case 'subadmin':
                $login = 'subadmin.login';
                break;

            default:
                $login = 'login';
                break;
        }



        //return mainResponse(false, 'api.unauthenticated', [], 401,'','');

//        return mainResponse(false, 'api.unauthenticated', [], []);
//        return response()->json(['status' => false ,'message' => __('api.unauthenticated') ]);
    }



}
