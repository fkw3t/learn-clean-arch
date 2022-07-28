<?php

namespace App;


class CPF
{
    private string $number;

    public function __construct(string $number)
    {
        $this->number = $this->setNumber($number);
    }

    public function setNumber(string $number): void
    {
        $options = [
            'options' => [
                'regexp' => '/\d{3}\.\d{3}\.\d{3}\-\d{2}/'
            ]
        ];

        if(filter_var($number, FILTER_VALIDATE_REGEXP, $options)){
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