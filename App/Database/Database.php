<?php

namespace App;

class Database {

    public function get_answers()
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
            'select COUNT(answer) from answers group by answer'
        );

        $stmt->execute();
        return $stmt->fetchAll();
    }
}