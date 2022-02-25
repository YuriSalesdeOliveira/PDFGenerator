<?php

use function DI\get;
use function DI\create;
use DI\ContainerBuilder;
use function DI\autowire;
use Source\Infra\Adapters\LocalStorage;
use Source\app\Interfaces\StorageInterface;
use Source\Infra\Adapters\PDFGeneratorDompdf;
use Source\Infra\Adapters\TwigTemplateEngine;
use Source\app\UseCases\ExportUser\ExportUser;
use Source\app\Interfaces\PDFGeneratorInterface;
use Source\Infra\Repositories\PDOUserRepository;
use Source\Infra\Presentation\ExportUserPresenter;
use Source\domain\Repositories\GetUserRepositoryInterface;
use Source\Infra\http\Controllers\Web\ExportUserController;
use Source\Infra\Presentation\Interfaces\TemplateEngineInterface;

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([

    /**
     * Export User
     */

    PDO::class => create(PDO::class)->constructor(
        database('dsn'),
        database('username'),
        database('password'),
        database('options')
    ),
    GetUserRepositoryInterface::class => get(PDOUserRepository::class),
    PDFGeneratorInterface::class => get(PDFGeneratorDompdf::class),
    StorageInterface::class => get(LocalStorage::class),
    ExportUser::class => autowire(ExportUser::class),
    TemplateEngineInterface::class => autowire(TwigTemplateEngine::class),
    ExportUserPresenter::class => autowire(ExportUserPresenter::class),
    ExportUserController::class => autowire(ExportUserController::class),

    /**
     * Export Post
     */

]);

return $containerBuilder->build();
