<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class Register extends DuskTestCase
{
    /**
     * @testdox Register Page.
     * @group register
     * @group register-success
     * @throws \Throwable
     */
    public function testRegisterUserSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Register')
                ->assertPathIs('/register')
                ->type('name', 'Novo Usuário')
                ->type('email', 'teste@tenhoemcasa.com')
                ->type('password', 'password')
                ->type('password_confirmation', 'password')
                ->click('Register')
                ->assertPathIs('/dashboard');
        });
    }

    /**
     * @testdox Register Page.
     * @group register
     * @group register-fail-email
     * @throws \Throwable
     */
    public function testRegisterUserFailEmail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Register')
                ->assertPathIs('/register')
                ->type('name', 'Novo Usuário')
                ->type('email', 'teste@tenhoemcasa')
                ->type('password', 'password')
                ->type('password_confirmation', 'password')
                ->click('Register')
                ->assertSee(app('translator')->get('validation.email'));
        });
    }

    /**
     * @testdox Register Page.
     * @group register
     * @group register-fail-password
     * @throws \Throwable
     */
    public function testRegisterUserFailPassword()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Register')
                ->assertPathIs('/register')
                ->type('name', 'Novo Usuário')
                ->type('email', 'teste@tenhoemcasa.com')
                ->type('password', '12345')
                ->type('password_confirmation', '12345')
                ->click('Register')
                ->assertSee(app('translator')->get('validation.min'));
        });
    }

    /**
     * @testdox Register Page.
     * @group register
     * @group register-fail-password-confirm
     * @throws \Throwable
     */
    public function testRegisterUserFailPasswordConfirm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Register')
                ->assertPathIs('/register')
                ->type('name', 'Novo Usuário')
                ->type('email', 'teste@tenhoemcasa.com')
                ->type('password', 'password')
                ->type('password_confirmation', 'password2')
                ->click('Register')
                ->assertSee(app('translator')->get('validation.confirmed'));
        });
    }
}
