<?php

namespace Source\Infra\Adapters;

use Exception;
use Source\app\Interfaces\StorageInterface;

final class LocalStorage implements StorageInterface
{
    public function store(string $path, string $fileName, string $content): string
    {
        if (file_put_contents($path . "/{$fileName}", $content)) {

            return $path . "/{$fileName}";
        }

        throw new Exception('Não foi possivel salvar o arquivo.');
    }
}