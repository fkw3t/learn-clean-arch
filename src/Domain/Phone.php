<?php

namespace App\Domain;

use App\Domain\Student\Student;
use Doctrine\ORM\Mapping\{Entity, Id, GeneratedValue, Column, ManyToOne};

/**
 * @Entity
 */
class Phone
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private readonly int $id;

    /**
     * @ManyToOne(targetEntity="App\Domain\Student\Student")
     */
    private Student $student;

    /**
     * @Column(type="string", length=2)
     */
    private string $ddd;
    
    /**
     * @Column(type="string", length=9)
     */
    private string $number;

    public function __construct(string $ddd, string $number)
    {
        $this->setDdd($ddd);
        $this->setNumber($number);
    }

    private function setDdd(string $ddd): void
    {
        if (preg_match('/\d{2}/', $ddd) !== 1) {
            throw new \InvalidArgumentException('Invalid DDD');
        }

        $this->ddd = $ddd;
    }

    private function setNumber(string $number): void
    {
        if (preg_match('/\d{8,9}/', $number) !== 1) {
            throw new \InvalidArgumentException('Invalid phone-number');
        }

        $this->number = $number;
    }

    // public function __toString(): string
    // {
    //     return "{$this->ddd} {$this->number}";
    // }

    public function addStudent(Student $student): self
    {
        $this->student = $student;
        return $this;
    }
}
