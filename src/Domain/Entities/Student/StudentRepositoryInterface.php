<?php

namespace App\Domain\Entities\Student;

use App\Domain\ValueObjects\CPF;
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