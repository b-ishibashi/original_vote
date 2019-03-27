<?php

namespace App\Database;

class Database
{
    public function getAnswers()
    {
        $pdo = new \PDO(
            'mysql:dbname=testdb;host=localhost',
            'root',
            '',
            [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ]
        );

        $stmt = $pdo->prepare(
            'select COUNT(answer) from polls group by answer'
        );

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
