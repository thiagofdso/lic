<?php

namespace CodeDelivery\Http\Controllers\Auth;

use CodeDelivery\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use CodeDelivery\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
    private $user;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware($this->guestMiddleware());
    }

    public function index(){
        return view('auth.password');
    }
    public function enviar(Request $request){
        $user = $this->user->where(['email' => $request->get('email')])->first();
        if($user!='')
            $this->sendResetLinkEmail($request);
        return view('auth.password');
    }
    public function getResetar($token,Request $request){
        return $this->getReset($request,$token);
    }
    public function resetar(Request $request){
        $response = $this->reset($request);
        return $response;

    }
    
}
