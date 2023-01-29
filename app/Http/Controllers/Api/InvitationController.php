<?php

namespace App\Http\Controllers\Api;

use App\Models\Invite;
use App\Models\Student;
use Illuminate\Support\Str;
use App\Mail\InvitationMail;
use App\Models\Questionnaire;
use App\Http\Controllers\Controller;
use App\Http\Resources\TokenCheckResource;
use App\Http\Traits\ResponseTraits\ApiResponseTrait;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    use ApiResponseTrait;

    protected $model;

    protected $questionnaire;

    protected $student;

    public function __construct(Invite $model, Questionnaire $questionnaire, Student $student)
    {
        $this->model = $model;
        $this->questionnaire = $questionnaire;
        $this->student = $student;
    }

    /**
     * Generate Invitattion links for all the students
     *
     * @param  int $id
     * @return void
     */
    public function invite(Int $id)
    {
        $questionnaire = $this->questionnaire->find($id);
        $students = $this->student->all();
        foreach ($students as $key => $student) {
            $token = Str::random(20);
            $invite = Invite::create([
                'questionnaire_id' => $questionnaire->id,
                'student_id' => $student->id,
                'token' => $token
            ]);
            $url = url('/questionnaire/response/' . $token);
            Mail::to($student->email)->queue(new InvitationMail($invite, $url));
        }
        return $this->response(['success' => true, 'message' => 'Inviatation Link Sent Successfully'], 200);
    }

    /**
     * Check if token is vaild and provide questions in response
     *
     * @param  string $token
     * @return void
     */
    public function check(String $token)
    {
        $model = $this->model->where('token', $token)->with('questionnaire.questions.section')->first();
        if ($model) {
            return $this->successResponse(new TokenCheckResource($model), 'Token checked successfully', 200);
        }
        return $this->failureResponse(498, 'Invalid Token');
    }
}
