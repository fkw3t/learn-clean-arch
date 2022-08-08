<?php

namespace App\Domain;

use Exception;

class Email
{
    private string $address;

    public function __construct(string $address)
    {
        $this->setEmail($address);
    }

    public function setEmail(string $address): void
    {
        if(filter_var($address, FILTER_VALIDATE_EMAIL)){
            $this->address = $address;
            return;
        }
        
        throw new \InvalidArgumentException('Invalid e-mail address');
    }

    public function __toString(): string
    {
        return $this->address;
    }
}