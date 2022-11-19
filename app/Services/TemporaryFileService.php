<?php

namespace App\Services;

use App\Repositories\TemporaryFileRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class TemporaryFileService
{
    private TemporaryFileRepository $temporaryFileRepository;

    public function __construct(TemporaryFileRepository $temporaryFileRepository)
    {
        $this->temporaryFileRepository = $temporaryFileRepository;
    }

    public function store(UploadedFile $file, string $folder): string
    {
        $name = uniqid() . '.' . $file->getClientOriginalExtension();
        $folder = uniqid($folder, true);
        $file->storeAs("tmp/$folder", $name);
        $this->temporaryFileRepository->store($folder, $name, $file->getSize(), $file->getMimeType());
        return $folder;
    }

    public function revert(string $folder)
    {
        $tmpFile = $this->temporaryFileRepository->getByFolder($folder);
        if ($tmpFile) {
            $this->temporaryFileRepository->destroy($tmpFile);
            Storage::deleteDirectory("tmp/$tmpFile->folder");
        }
    }
}
