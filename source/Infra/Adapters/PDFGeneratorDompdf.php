<?php

namespace Source\Infra\Adapters;

use Dompdf\Dompdf;
use Source\app\Interfaces\PDFGeneratorInterface;
use Source\domain\Entities\Entity;

class PDFGeneratorDompdf implements PDFGeneratorInterface
{
    public function generator(Entity $entity): string
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml($entity);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->output();
    }
}