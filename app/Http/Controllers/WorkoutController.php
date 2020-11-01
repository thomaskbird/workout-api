<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            $input['slug'] = $this->create_slug($input['title']);
            $input['user_id'] = $this->getUserIdFromToken($request->bearerToken());

            $workout = Workout::create($input);

            return response(json_encode([
                'status' => true,
                'data' => [
                    'workout' => $workout
                ]
            ]));
        }
    }

    public function workout_single($id) {
        $workout = Workout::with(['exercises'])->where('id', $id)->first();

        return response(json_encode([
            'status' => true,
            'data' => [
                'workout' => $workout
            ]
        ]));
    }
}