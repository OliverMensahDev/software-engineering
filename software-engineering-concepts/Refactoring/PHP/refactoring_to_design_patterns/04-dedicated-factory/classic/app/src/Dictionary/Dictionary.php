<?php

declare(strict_types=1);

namespace App\Dictionary;

interface Dictionary
{
    public function getDefinitions(string $word): array;
}
