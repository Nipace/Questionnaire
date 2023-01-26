<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class UserAuthenticationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     * 
     * Test if user can login with correct credentials
     *
     * @return void
     */
    public function user_can_login_with_correct_credentials()
    {
        $user = User::factory()->create();
        $response = $this->post('/api/login',[
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertStatus(200);
        $response->assertJson(function(AssertableJson $json) use($user){
            $json->hasAll(['success','data.token','message'])->where('success','true');
        });
    }
    
    /**
     * @test
     * 
     * Test that user cannot login with wrong credentails
     *
     * @return void
     */
    public function user_cannot_login_with_incorrect_credentials(){
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->post('/api/login',[
            'email' => $user->email,
            'password' => 'jpt'
        ]);
        $response->assertStatus(401);
        $response->assertJson(function(AssertableJson $json) use($user){
            $json->hasAll(['success','message'])->where('success','false');
        });
    }
}
