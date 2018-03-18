<?php

namespace Tvswe\DatabaseBundle\Service;

use \PDO;

class DatabaseConnection
{
    /** @var PDO */
    private $pdo;
    
    public function __construct(array $config) {
        $this->connect($config);
    }
    
    private function connect(array $config)
    {
        $dsn = 'mysql:dbname=' . $config['database'] . ';host=' . $config['host'];
        
        try {
            $this->pdo = new PDO($dsn, $config['user'], $config['password']);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
    
    
}
