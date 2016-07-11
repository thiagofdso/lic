<?php

namespace CodeDelivery\Http\Middleware;

use Closure;
use CodeDelivery\Repositories\UserRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class OauthCheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    private $userRepository;
    public  function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle($request, Closure $next, $role)
    {
        $id = Authorizer::getResourceOwnerId();
        $user = $this->userRepository->find($id);
        if ($user->role != $role) {
            abort(403,'Acess Forbidden');
        }
        return $next($request);
    }


}
