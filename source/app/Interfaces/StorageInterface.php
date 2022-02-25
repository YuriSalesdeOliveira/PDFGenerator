<?php

namespace Source\app\Interfaces;

interface StorageInterface
{
    public function store(string $path, string $fileName, string $content): string;
}