<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

trait ImageTrait
{

    /**
     * store
     *
     * @param  mixed $file
     * @param  string $folder
     * @param  int $width
     * @param  int $height
     * @return string
     */
    public function storeImage($file, $folder, $width = 200, $height = 200): string
    {
        $this->checkFolder($folder);
        $image_name = $this->generateImageName($file);
        $img = Image::make($file->getRealPath());
        // $img->resize($width, $height, function ($constraint) {
        // $constraint->aspectRatio();
        // })->save($destinationPathThumbnail . '/' . $imageName);
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save('public/uploads/struktural/'.$image_name);
        $file->move($this->getFolderThumbnail(), $image_name);
        $this->deleteImage($image_name, 'thumbnail');
        return $this->getImageUrl($folder, $image_name);
    }

    public function deleteImage($image, $folder)
    {
        return File::delete(public_path('uploads/'.$folder.'/' . $image));
        // return Storage::delete('public/'.$folder.'/' . $image);
    }

    public function getFolderThumbnail()
    {
        $this->checkFolder('thumbnail');
        return public_path('uploads/thumbnail');
    }

    public function getFolderImage($folder)
    {
        return public_path('uploads/' . $folder);
    }

    public function generateImageName($image)
    {
        return str()->random(10) . time() . '.' . $image->extension();
    }

    public function getImageUrl($folder, $image_name)
    {
        if (str(request()->getUri())->contains('https')) {
            return url('/uploads' . '/' . $folder . '/' . $image_name);
        }
        return env('APP_URL').'/uploads' . '/' . $folder . '/' . $image_name;
    }

    public function checkFolder($folder)
    {
        if (!Storage::exists('public/' . $folder)) {
            return Storage::makeDirectory('public/' . $folder);
        }
    }

    public function moveImage($name, $thumb, $folder, $width = 200, $height = 200)
    {
        $this->checkFolder($folder);
        $img = Image::make($thumb);
        $result_name = explode('.', $name);
        $result_name = str()->random(10) . time() . '.' . $result_name[1];
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save($this->getFolderImage($folder) . '/' . $result_name);
        $this->deleteImage($name, 'thumb');
        return $this->getImageUrl($folder, $result_name);
    }
}
