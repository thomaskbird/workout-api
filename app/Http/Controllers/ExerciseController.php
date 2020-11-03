<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Exercise;

class ExerciseController extends Controller {
    public function exercise_add(Request $request) {
        $input = $request->all();
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $fully_qualified_path = public_path() .'/img/exercises';
        $file->move($fully_qualified_path, $filename);

        $validator = Validator::make($input, [
            'title' => 'required',
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
            $input['image'] = $filename;

            $exercise = Exercise::create($input);

            return response(json_encode([
                'status' => true,
                'data' => [
                    'exercise' => $exercise
                ]
            ]));
        }
    }

    public function exercise_list(Request $request) {
        $user_id = $this->getUserIdFromToken($request->bearerToken());
        $exercises = Exercise::where('user_id', $user_id)->get();

        return response(json_encode([
            'status' => true,
            'data' => [
                'exercises' => $exercises
            ]
        ]));
    }

    public function exercise_single($id) {
        $exercise = Exercise::with(['steps'])->where('id', $id)->first();

        return response(json_encode([
            'status' => true,
            'data' => [
                'exercise' => $exercise
            ]
        ]));
    }
}