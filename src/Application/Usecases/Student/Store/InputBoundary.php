<?php

namespace App\Application\Usecases\Student\Store;

class InputBoundary
{
    public function __construct(
        public readonly string $name,
        public readonly string $cpf,
        public readonly string $email,
        public readonly ?string $ddd,
        public readonly ?string $phone,
    ) {}
}