<?php

namespace App\Domain\ValueObjects;


class CPF
{
    private string $number;

    public function __construct(string $number)
    {
        $this->setNumber($number);
    }

    private function setNumber(string $number): void
    {
        if (strlen($number) == 11 && is_numeric($number)) {
            $this->number = $number;
            return;
        }
        
        throw new \InvalidArgumentException('Invalid document');
    }

    public function __toString(): string
    {
        return $this->number;
    }
}