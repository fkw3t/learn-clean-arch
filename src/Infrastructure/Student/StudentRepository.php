<?php

namespace App\Infrastructure\Student;

use App\Domain\Student\{Student, StudentRepositoryInterface}; 
use App\Domain\CPF;
use App\Infrastructure\EntityManagerFactory;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

use function PHPUnit\Framework\throwException;

class StudentRepository implements StudentRepositoryInterface
{
    private EntityManager $entityManager;
    private EntityRepository $repository;

    public function __construct()
    {
        $this->entityManager = EntityManagerFactory::createEntityManager();
        $this->repository = $this->entityManager->getRepository(Student::class);
    }

    public function getById(int $id): Student
    {
        $student = $this->entityManager->find(Student::class, $id);
        return $student;
    }

    public function getByCPF(CPF $cpf): Student
    {
        $student = $this->repository->findOneBy(['cpf' => $cpf]); 
        return $student;
    }

    public function getAll(): array
    {
        $students = $this->repository->findAll();
        return $students;
    }

    public function insert(Student $aluno): void
    {
        $this->entityManager->persist($aluno);
        $this->entityManager->flush();
    }

    public function update(Student $student): void
    {
        $this->entityManager->flush();
    }

    public function delete(Student $student): void
    {
        $this->entityManager->remove($student);
    }
}