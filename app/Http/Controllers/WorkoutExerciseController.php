<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\WorkoutExercise;

class WorkoutExerciseController extends Controller {
    public function add(Request $request) {
        $input = $request->all();

        $validator = Validator::make($input, [
            'workout_id' => 'required',
            'exercise_id' => 'required'
        ]);

        if($validator->fails()) {
            return response(json_encode([
                'status' => false,
                'errors' => $validator->errors()
            ]), 400);
        } else {
            $input['user_id'] = $this->getUserIdFromToken($request->bearerToken());
            $workout_exercise = WorkoutExercise::create($input);

            return response(json_encode([
                'status' => true,
                'data' => [
                    'workout_exercise' => $workout_exercise
                ]
            ]));
        }
    }
}