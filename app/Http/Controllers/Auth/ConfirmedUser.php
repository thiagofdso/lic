<?php

namespace CodeDelivery\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

trait ConfirmedUser
{
    /**
     * Get the failed login response instance.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendUnconfirmedUserResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getUnconfirmedUserMessage(),
            ]);
    }
    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getUnconfirmedUserMessage()
    {
        return Lang::has('auth.confirmed')
                ? Lang::get('auth.confirmed')
                : 'Usuário não confirmado, verifique  o seu email.';
    }


}
