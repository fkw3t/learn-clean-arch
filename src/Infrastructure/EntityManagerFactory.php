<?php

namespace App\Infrastructure;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

class EntityManagerFactory
{
    public static function createEntityManager(): EntityManager
    {
        $config = ORMSetup::createAnnotationMetadataConfiguration([__DIR__."/src"],
            true,
        );
        // or if you prefer YAML or XML
        // $config = ORMSetup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
        // $config = ORMSetup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);
        
        $conn = [
            'dbname' => 'clean-arch',
            'user' => 'root',
            'password' => '30246156Az$',
            'host' => 'localhost',
            'driver' => 'pdo_mysql'
        ];
        
        return EntityManager::create($conn, $config);
    }
}
