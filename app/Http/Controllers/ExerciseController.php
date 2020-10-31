<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

use App\Models\Exercise;

class ExerciseController extends Controller {
    public function add(Request $request) {
        $input = $request->all();

//        $validator = Validator::make($input, [
//            'title' => 'required',
//        ]);
//
//        if($validator->fails()) {
//            return response(json_encode([
//                'status' => false,
//                'errors' => $validator->errors()
//            ]));
//        } else {
            $user_id = $this->getUserIdFromToken($request->bearerToken());

            $input['slug'] = $this->create_slug($input['title']);
            $input['user_id'] = $user_id;

            $exercise = Exercise::create($input);

            return response(json_encode([
                'status' => true,
                'data' => [
                    'exercise' => $exercise
                ]
            ]));
//        }
    }
}