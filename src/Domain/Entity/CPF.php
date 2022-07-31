<?php

namespace App\Domain\Entity;


class CPF
{
    private string $number;

    public function __construct(string $number)
    {
        $this->setNumber($number);
    }

    private function setNumber(string $number): void
    {
        $opcoes = [
            'options' => [
                'regexp' => '/\d{3}\.\d{3}\.\d{3}\-\d{2}/'
            ]
        ];
        if (filter_var($number, FILTER_VALIDATE_REGEXP, $opcoes)) {
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