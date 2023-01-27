<?php

namespace Tests\Feature;

use App\Models\Questionnaire;
use Carbon\Carbon;
use Tests\TestCase;
use function PHPUnit\Framework\assertCount;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionnaireTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     * 
     * Test if a questionnaire is created
     *
     * @return void
     */
    public function a_questionnaire_is_created()
    {

        $response = $this->post('/api/questionnaire',[
            'title'=>'title',
            'expiry_date' => Carbon::today()->addDays(15)
        ]);

        $response->assertStatus(200);
        $this->assertCount(1,Questionnaire::all());

    }

    
}
