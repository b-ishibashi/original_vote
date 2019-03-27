<?php

namespace App\Model;

class Poll {

    public function save($request)
    {
        $pdo = new \PDO(
            'mysql:dbname=testdb;host=localhost',
            'root',
            '',
            [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            ]
        );

        $stmt = $pdo->prepare(
            'insert into answers (answer, created) values (:answer, now())'
        );
        $stmt->bindValue(':answer', $request['answer'], \PDO::PARAM_INT);
        $stmt->execute();
    }
}