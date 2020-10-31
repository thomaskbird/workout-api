<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\ExerciseStep;

class ExerciseStepController extends Controller {
    public function exercise_step_add(Request $request) {
        $input = $request->all();

        $input['user_id'] = $this->getUserIdFromToken($request->bearerToken());
        $exercise_step = ExerciseStep::create($input);

        return response(json_encode([
            'status' => true,
            'data' => [
                'exercise_step' => $exercise_step
            ]
        ]));
    }
}