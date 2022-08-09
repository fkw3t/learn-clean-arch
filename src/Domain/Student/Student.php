<?php

namespace App\Domain\Student;

use App\Domain\CPF;
use App\Domain\Email;
use App\Domain\Phone;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\{Entity, Id, GeneratedValue, Column, OneToMany};

/**
 * @Entity
 */
class Student
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private readonly int $id;

    /**
     * @Column(type="string", length=14, unique=true)
     */
    private readonly CPF $cpf;

    /**
     * @Column(type="string")
     */
    private string $name;

    /**
     * @Column(type="string", unique=true)
     */
    private Email $email;

    /**
     * @OneToMany(targetEntity="App\Domain\Phone", mappedBy="student", cascade={"remove", "persist"})
     */
    private Collection $phones;

    
    public function __construct(CPF $cpf, string $name, Email $email)
    {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
        $this->phones = new ArrayCollection();
    }
    
    public static function withCPFNameEmail(string $cpf, string $name, string $email): self
    {
        return new Student(
            new CPF($cpf),
            $name,
            new Email($email)
        );
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function addPhone(Phone $phone): self
    {
        $this->phones->add($phone);
        $phone->addStudent($this);
        return $this;
    }

    public function getPhone(Phone $phone): Collection
    {
        return $this->phones;
    }
}
