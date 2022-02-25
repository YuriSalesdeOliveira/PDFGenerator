<?php

namespace Source\app\UseCases\ExportUser;

use Source\domain\ValueObjects\Identity;
use Source\app\Interfaces\StorageInterface;
use Source\app\Interfaces\PDFGeneratorInterface;
use Source\app\UseCases\ExportUser\OutputBoundary;
use Source\domain\Repositories\GetUserRepositoryInterface;

class ExportUser
{
    private GetUserRepositoryInterface $repository;
    private PDFGeneratorInterface $pdfGenerator;
    private StorageInterface $storage;

    public function __construct(
        GetUserRepositoryInterface $repository,
        PDFGeneratorInterface $pdfGenerator,
        StorageInterface $storage
    ) {
        $this->repository = $repository;
        $this->pdfGenerator = $pdfGenerator;
        $this->storage = $storage;
    }

    public function handle(InputBoundary $input)
    {
        $user = $this->repository->getUserById(new Identity($input->getId()));

        $content = $this->pdfGenerator->generator($user);

        $fullPath = $this->storage->store(
            $input->getStoragePath(),
            $input->getStorageFileName(),
            $content
        );

        return new OutputBoundary($fullPath);
    }
}