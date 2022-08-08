<?php

namespace App\Domain\Entity\Student;

use App\Domain\Entity\CPF;

interface StudentRepositoryInterface
{
    public function insert(Student $student): bool;
    public function getById(int $id): Student;
    public function getByCPF(CPF $cpf): Student;
    public function getAll(): Student;
    public function update(Student $student, array $data): bool;
    public function delete(Student $student): bool;
}