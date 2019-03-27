<?php

namespace app\Model;

use app\Http\Session;

class Poll
{
    public function save($request)
    {
        try {
            $pdo = new \PDO(
                'mysql:dbname=testdb;host=localhost',
                'root',
                '',
                [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                ]
            );

            $stmt = $pdo->prepare(
                'insert into polls (answer, created, remote_addr, user_agent, answer_date) values (:answer, now(), :remote_addr, :user_agent, now())'
            );
            $stmt->bindValue(':answer', $request['answer'], \PDO::PARAM_INT);
            $stmt->bindValue(':remote_addr', $_SERVER['REMOTE_ADDR'], \PDO::PARAM_STR);
            $stmt->bindValue(':user_agent', $_SERVER['HTTP_USER_AGENT'], \PDO::PARAM_STR);
            $stmt->execute();
        } catch (\Exception $e) {
            (new Session())->set('err', '投票は1日1回までです');
        }
    }
}
