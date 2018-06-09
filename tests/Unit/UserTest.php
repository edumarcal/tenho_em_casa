<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @testdox Create User.
     * @group user
     * @group user-create
     * @throws \Throwable
     */
    public function testCreateUser()
    {
        $user = factory(User::class)->create();
        $this->assertNotNull($user);
    }

    /**
     * @testdox Update User.
     * @group user
     * @group user-update
     * @throws \Throwable
     */
    public function testUpdateUser()
    {
        $user = factory(User::class)->create();

        $user->name = 'Updated Name';

        $user->update();

        $this->assertEquals(1, User::all()->count());
    }

    /**
     * @testdox Remove User.
     * @group user
     * @group user-remove
     * @throws \Throwable
     */
    public function testRemoveUser()
    {
        $user = factory(User::class)->create();

        $user->delete();

        $this->assertEquals(0, User::all()->count());
    }
}
