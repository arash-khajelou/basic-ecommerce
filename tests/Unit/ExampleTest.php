<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase {
    use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
        $this->initDatabase();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true() {
        $user = User::find(1);
        $expected = $user->is_admin ? "/admin" : "/";
        $this->assertEquals($expected, UserService::getUserHome($user));
    }
}
