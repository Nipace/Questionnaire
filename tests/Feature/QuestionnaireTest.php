<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Questionnaire;
use function PHPUnit\Framework\assertCount;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
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
    
    /**
     * @test
     * Tests if active questionnaires are retrived
     *
     * @return void
     */
    public function active_questionnaires_are_retrived()
    {
        $response = $this->post('/api/questionnaire',[
            [
                'title'=>'title',
                'expiry_date' => Carbon::today()->addDays(15)
            ],
            [
                'title'=>'title',
                'expiry_date' => Carbon::today()->subdays(15)
            ]
        ]);
        $response = $this->get('/api/questionnaire');
        $response->assertStatus(200);
        $response->assertCount(1);
        $response->assertJson(function(AssertableJson $json){
            $json->hasAll(['status','data','message'])->where('status',true);
        });
    }

    
}
