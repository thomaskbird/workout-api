<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Workout;
use Illuminate\Support\Facades\Validator;

class WorkoutController extends Controller {
    public function workout_add(Request $request) {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'est_time' => 'required',
            'level' => 'required'
        ]);

        if($validator->fails()) {
            return response(json_encode([
                'status' => false,
                'errors' => $validator->errors()
            ]));
        } else {
            $user_id = $this->getUserIdFromToken($request->bearerToken());

            $input['slug'] = $this->create_slug($input['title']);
            $input['user_id'] = $user_id;

            $workout = Workout::create($input);

            return response(json_encode([
                'status' => true,
                'data' => [
                    'workout' => $workout
                ]
            ]));
        }
    }
}