<?php

namespace App\Domain\Student;

use App\Domain\CPF;
use Doctrine\Common\Collections\Collection;

interface StudentRepositoryInterface
{
    public function insert(Student $student): void;
    public function getById(int $id): Student;
    public function getByCPF(CPF $cpf): Student;
    public function getAll(): array;
    public function update(Student $student): void;
    public function delete(Student $student): void;
}