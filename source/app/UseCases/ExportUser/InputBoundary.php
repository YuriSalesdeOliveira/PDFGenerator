<?php

namespace Source\app\UseCases\ExportUser;

final class InputBoundary
{
    private string $id;
    private string $storagePath;
    private string $storageFileName;

    public function __construct(
        string $id,
        string $storagePath,
        string $storageFileName
    ) {
        $this->id = $id;
        $this->storagePath = $storagePath;
        $this->storageFileName = $storageFileName;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStoragePath()
    {
        return $this->storagePath;
    }

    public function getStorageFileName()
    {
        return $this->storageFileName;
    }
}