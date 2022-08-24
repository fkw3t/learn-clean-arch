<?php

use App\Application\Usecases\Student\Store\InputBoundary;
use App\Application\Usecases\Student\Store\StoreStudent;
use App\Infrastructure\Student\StudentRepository;

require_once __DIR__ . '/../vendor/autoload.php';

// depedencies

$studentRepository = new StudentRepository();

// application

$input = new InputBoundary(
    'Elianber Teixeira',
    '15196832602',
    'mail@mail.com',
    '31',
    '997467665'
); 

$store = new StoreStudent($studentRepository);
$output = $store->handle($input);

var_dump($output);

