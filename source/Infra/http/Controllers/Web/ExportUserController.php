<?php

namespace Source\Infra\http\Controllers\Web;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Source\app\UseCases\ExportUser\ExportUser;
use Source\app\UseCases\ExportUser\InputBoundary;
use Source\Infra\Presentation\ExportUserPresenter;

final class ExportUserController extends Controller
{
    private ExportUser $useCase;
    private ExportUserPresenter $presenter;

    public function __construct(ExportUser $useCase, ExportUserPresenter $presenter)
    {
        $this->useCase = $useCase;
        $this->presenter = $presenter;
    }

    public function handle(Request $request, Response $response, array $args)
    {
        $input = new InputBoundary(
            $args['id'],
            storagePath: path('storage') . '/user',
            storageFileName: md5(uniqid()) . '.pdf'
        );
        
        $output = $this->useCase->handle($input);

        $response->getBody()->write(
            $this->presenter->output([
                'fullFileName' => $output->getFullFileName()
            ])
        );

        return $response;
    }
}