<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\PaginateTrait;
use App\Models\UserQuestions;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    use PaginateTrait;

    public function questions(Request $request)
    {
        $data = UserQuestions::where('user_id', $request->user_id);
        return $this->apiResponse($data);
    }

    public function edit_questions(Request $request)
    {
        if (isset($request->questions)) {
            foreach ($request->questions as $key => $question) {
                UserQuestions::create([
                    'user_id' => user_api()->id(),
                    'question' => $question,
                    'answer' => $request->answers[$key]
                ]);
            }
        }
        $data = UserQuestions::where('user_id', user_api()->id());
        return $this->apiResponse($data);
    }

}
