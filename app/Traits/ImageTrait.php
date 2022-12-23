<?php

namespace App\Traits;

use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

trait ImageTrait
{
    public function storeImage(UploadedFile $file, string $folder, int $width = 200, int $height = 200)
    {
        $imageName = $this->getRandomName($file);
        $folderStore = $this->getFolderStore($folder);
        $imgFile = Image::make($file->getRealPath());
        $imgFile->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save($folderStore . '/' . $imageName);
        return $this->getImageUrl($folder, $imageName);
    }

    public function storeImageFilePond(UploadedFile $file, string $folder)
    {
        $this->checkFolder($folder);
        return $file->store($folder);
    }

    public function deleteImageFilePond($name)
    {
        return Storage::delete(str($name)->replace('"', '')->replace("\\", ''));
    }

    public function storeFile(UploadedFile $file, string $folder)
    {
        $fileName = $this->getRandomName($file);
        $this->checkFolder($folder);
        $file->move(public_path("storage/$folder"), $fileName);
        return env('APP_URL') . "/storage/$folder/$fileName";
    }

    public function getFolderStore(string $folder)
    {
        $this->checkFolder($folder);
        return public_path("storage/$folder");
    }

    public function checkFolder(string $folder)
    {
        if (!Storage::exists($folder)) {
            return Storage::makeDirectory($folder);
        }
    }

    public function getRandomName(UploadedFile $file)
    {
        return str()->random(10) . time() . '.' . $file->extension();
    }

    public function imageStorageDelete(string $folder, string $imageName)
    {
        return Storage::delete($folder . '/' . $imageName);
    }

    public function getImageUrl(string $folder, string $imageName)
    {
        return url("storage/$folder/$imageName");
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

    public function fromBase64(string $base64File): UploadedFile
    {
        // Get file data base64 string
        $fileData = base64_decode(Arr::last(explode(',', $base64File)));

        // Create temp file and get its absolute path
        $tempFile = tmpfile();
        $tempFilePath = stream_get_meta_data($tempFile)['uri'];

        // Save file data in file
        file_put_contents($tempFilePath, $fileData);

        $tempFileObject = new File($tempFilePath);
        $file = new UploadedFile(
            $tempFileObject->getPathname(),
            $tempFileObject->getFilename(),
            $tempFileObject->getMimeType(),
            0,
            true // Mark it as test, since the file isn't from real HTTP POST.
        );

        // Close this file after response is sent.
        // Closing the file will cause to remove it from temp director!
        app()->terminating(function () use ($tempFile) {
            fclose($tempFile);
        });

        // return UploadedFile object
        return $file;
    }
}
