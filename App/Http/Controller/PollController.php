<?php

namespace App\Http\Controller;

use App\Http\Session;
use App\Model\Poll;
use \App\Database;

require_once __DIR__ . '/../Session.php';
require_once __DIR__ . '/../../Model/Poll.php';
require_once __DIR__ . '/../../Database/Database.php';

class PollController {

    private $session;

    public function __construct(Session $session)
    {

        $this->session = $session;
        $this->session->createToken();
    }

    public function store($request)
    {
        try {

            // CSRFトークン検証
            $this->validateToken($request);

            // answer検証
            $this->validateAnswer($request);

            //save
            (new Poll)->save($request);

            //getAnswer

        } catch (\Exception $e) {
            $this->session->set('err', $e->getMessage());
        }
        // redirect
        header('Location: /');
    }

    public function index()
    {
        $results = (new Database())->getAnswers();

        include __DIR__ . '/../../../public/result.php';
    }

    private function validateToken($request)
    {
        // 期待する値
        $expected = $this->session->get('token');

        // 実際に送られてきた値
        $actual = $request['token'] ?? null;

        if ($expected === null || $actual === null || $expected !== $actual) {
            throw new \Exception('invalid token!');
        }
    }

    private function validateAnswer($request)
    {
        if (
            !isset($request['answer']) ||
            !in_array($request['answer'], [0, 1, 2])
        ) {
            throw new \Exception('invalid answer!');
        }
    }
}
