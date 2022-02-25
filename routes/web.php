<?php

use Slim\App;
use Source\Infra\http\Controllers\Web\ExportUserController;

return function (App $app) {

    $app->get('/export/user/{id}', [ExportUserController::class, 'handle'])->setName('exportUser');

};