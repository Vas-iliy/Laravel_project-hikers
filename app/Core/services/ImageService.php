<?php


namespace App\Core\services;


use App\Http\Requests\StorePost;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public static function uploadImagePost(StorePost $request, $image = null)
    {
        if ($request->hasFile('image')) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('image')->store("images/{$folder}");
        }
        return null;
    }
}
