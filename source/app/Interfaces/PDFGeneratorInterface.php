<?php

namespace Source\app\Interfaces;

use Source\domain\Entities\Entity;

interface PDFGeneratorInterface
{
    public function generator(Entity $entity): string;
}