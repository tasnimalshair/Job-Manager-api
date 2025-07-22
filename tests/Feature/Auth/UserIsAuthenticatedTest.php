<?php

namespace Tests\Feature\Application;

use Tests\TestCase;

class UserIsAuthenticatedTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_is_authenticated(): void
    {
        $response = $this->getJson('api/user/applications');

        $response->assertStatus(401);
    }
}
