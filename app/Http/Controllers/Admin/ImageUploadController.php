<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function store(Request $request) {
        if($request->upload && $request->upload instanceof UploadedFile) {
            $url =   Storage::putFile('photos', new File($request->upload));
            return response()->json($url);
        }
    }
}
