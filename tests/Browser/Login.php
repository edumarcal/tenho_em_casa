<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class Login extends DuskTestCase
{
    /**
     * @testdox Login Page.
     * @group login
     * @group login-success
     * @throws \Throwable
     */
    public function testLoginUserSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Login')
                ->assertPathIs('/login')
                ->type('email', 'usuario@tenhoemcasa.com')
                ->type('password', 'password')
                ->click('Login')
                ->assertPathIs('/home');
        });
    }

    /**
     * @testdox Login Page.
     * @group login
     * @group login-fail
     * @throws \Throwable
     */
    public function testLoginUserFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Login')
                ->assertPathIs('/login')
                ->type('email', 'usuario@tenhoemcasa.com.br')
                ->type('password', 'password')
                ->click('Login')
                ->assertSee(app('translator')->get('auth.failed'));
        });
    }
}
