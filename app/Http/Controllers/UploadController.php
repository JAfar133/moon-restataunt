<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Database\QueryException;

class UploadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function uploadImage(Request $request)
    {
        $file = $request->file('image');

        // проверяем тип файла
        if (! $file->isValid() || ! in_array($file->getClientMimeType(), ['image/png', 'image/jpeg', 'image/jpg'])) {
            return response()->json(['message' => 'Invalid file type. Only PNG, JPEG or JPG images are allowed.']);
        }

        $filename = $file->getClientOriginalName();

        try {
            // сохраняем файл на сервере
            $path = $file->storeAs('public/images',$filename);
            $image = new Image();
            $image->path = $path;
            $image->save();
            return response()->json(['message' => 'Image uploaded successfully', 'path' => $path]);
        } catch (QueryException $e) {
            return response()->json(['message' => 'File with this name already exists.'], 409);
        }
    }
}

