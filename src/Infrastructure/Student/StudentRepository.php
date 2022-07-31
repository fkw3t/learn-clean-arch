<?php

namespace App\Infrastructure\Student;

use App\Domain\Entity\Student\{Student, StudentRepositoryInterface}; 
use App\Domain\Entity\CPF;

class StudentRepository implements StudentRepositoryInterface
{
    public function getById(int $id): Student
    {
        return (new Student());
    }

    public function getByCPF(CPF $cpf): Student
    {
        return (new Student());
    }

    public function getAll(): Student
    {
        return (new Student());
    }

    public function insert(Student $aluno): bool
    {
        return true;
    }

    public function update(Student $aluno, array $data): bool
    {
        return true;
    }

    public function delete(Student $student): bool
    {
        return true;
    }
}