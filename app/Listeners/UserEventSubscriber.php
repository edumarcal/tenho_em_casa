<?php
# Agradeço a Deus pelo dom do conhecimento
namespace App\Listeners;

class UserEventSubscriber
{
    protected $subscribe = [
        'App\Listeners\UserEventSubscriber',
    ];

    public function onUserLogin()
    {
        $user = auth()->user();
        $tokenAccess = encrypt('Salt' . $user->email);
        $user->token_access = $tokenAccess;
        $user->saveOrFail();
        session()->put('access_token', $tokenAccess);
    }

    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );
    }
}
