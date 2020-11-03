<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getUserIdFromToken($token) {
        $decoded_token = base64_decode($token);
        $token_parts = explode('||', $decoded_token);
        return $token_parts[0];
    }

    public function create_slug($str, $splitter = '-') {
        return Str::slug($str, $splitter);
    }

    public function cleanFilename($filename, $splitter = '-') {
//        return preg_replace("([^\w\s\d\.\-_~,;:\[\]\(\)]|[\.]{2,})", '', $filename);

        return preg_replace("/[^a-z0-9\_\-\.]/i", $splitter, $filename);
    }
}
