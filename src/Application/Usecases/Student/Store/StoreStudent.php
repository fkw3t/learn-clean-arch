<?php

namespace App\Application\Usecases\Student\Store;

use App\Domain\ValueObjects\Phone;
use App\Domain\Entities\Student\Student;
use App\Domain\Entities\Student\StudentRepositoryInterface;

class StoreStudent
{
    private StudentRepositoryInterface $repository;

    public function __construct(StudentRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handle(InputBoundary $input): array
    {
        try {
            $student = Student::withCPFNameEmail(
                $input->cpf,
                $input->name,
                $input->email
            );
            
            if($input->ddd && $input->phone){
                $phone = new Phone($input->ddd, $input->phone);
                $student->addPhone($phone);
            }

            $this->repository->insert($student);
            
            return [
                'status' => 'sucess',
                'exception' => null
            ];

        } catch (\Throwable $e) {
            return [
                'status' => 'error',
                'exception' => $e
            ];
        }
    }
}