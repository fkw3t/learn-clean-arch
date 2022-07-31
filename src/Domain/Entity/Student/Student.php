<?php

namespace App\Domain\Entity\Student;

use App\Domain\Entity\CPF;
use App\Domain\Entity\Email;
use App\Domain\Entity\Phone;

class Student
{
    private int $id;
    private string $name;
    private CPF $cpf;
    private Email $email;
    private Phone $phone;
}
