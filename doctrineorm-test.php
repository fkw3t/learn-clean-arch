<?php

use App\Domain\Phone;
use App\Domain\Student\Student;
use App\Infrastructure\EntityManagerFactory;


require_once 'vendor/autoload.php';

$entityManager = EntityManagerFactory::createEntityManager();

$student = Student::withCPFNameEmail(
    '12312312302',
    'Eliabner Teixeira Marques',
    'iamelitm@gmail.com'
);
$student->same = 'Elia';

$phone = new Phone('31', '997467665');
$student->addPhone($phone);

$entityManager->persist($student);
$entityManager->flush();
