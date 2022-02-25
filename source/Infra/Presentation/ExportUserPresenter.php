<?php

namespace Source\Infra\Presentation;

use Source\Infra\http\Controllers\Web\PresentationInterface;
use Source\Infra\Presentation\Interfaces\TemplateEngineInterface;

class ExportUserPresenter implements PresentationInterface
{
    protected TemplateEngineInterface $templateEngine;

    public function __construct(TemplateEngineInterface $templateEngine)
    {
        $this->templateEngine = $templateEngine;
    }

    public function output(array $data): string
    {
        return $this->templateEngine->render('welcome', [
            'fullFileName' => $data['fullFileName']
        ]);
    }
}