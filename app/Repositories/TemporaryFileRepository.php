<?php

namespace App\Repositories;

use App\Models\TemporaryFile;

class TemporaryFileRepository
{
    private TemporaryFile $temporaryFile;

    public function __construct(TemporaryFile $temporaryFile)
    {
        $this->temporaryFile = $temporaryFile;
    }

    public function getByFolder(string $folder): TemporaryFile|null
    {
        return $this->temporaryFile->query()->where('folder', $folder)->first();
    }

    public function store(string $folder, string $name, int $size, string $type): TemporaryFile
    {
        return $this->temporaryFile->query()->create([
            'folder' => $folder,
            'name' => $name,
            'size' => $size,
            'type' => $type
        ]);
    }

    public function destroy(TemporaryFile $temporaryFile)
    {
        return $temporaryFile->delete();
    }
}
