<?php

use App\Infrastructure\EntityManagerFactory;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
// require_once 'bootstrap.php';

$entityManager = EntityManagerFactory::createEntityManager();

return ConsoleRunner::createHelperSet($entityManager);