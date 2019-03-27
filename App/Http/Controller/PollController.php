<?php

namespace App\Http\Controller;

use App\Http\Session;
use App\Model\Poll;

require_once __DIR__ . '/../Session.php';
require_once __DIR__ . '/../../Model/Poll.php';

class PollController {

    private $session;

    public function __construct(Session $session)
    {

        $this->session = $session;
        $this->session->createToken();
    }

    public function post($request)
    {
        try {

            // CSRFトークン検証
            $this->validateToken($request);

            // answer検証
            $this->validateAnswer($request);

            // 投票成功
            $this->session->set_session('err', '投票しました');

            //save
            (new Poll)->save($request);

            // redirect
            header('Location: /result.php');
        } catch (\Exception $e) {
            $this->session->set_session('err', $e->getMessage());
            exit;
            // redirect
            header('Location: /');
        }
    }

    private function validateToken($request)
    {
        // 期待する値
        $expected = $this->session->get_session('token');

        // 実際に送られてきた値
        $actual = $request['token'] ?? null;

        if ($expected === null || $actual === null || $expected !== $actual) {
            throw new \Exception('invalidate token!');
        }
    }

    private function validateAnswer($request)
    {
        if (
            !isset($request['answer']) ||
            !in_array($request['answer'], [0, 1, 2])
        ) {
            throw new \Exception('invalidate answer!');
        }
    }
}
