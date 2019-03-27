<?php

namespace App\Http\Controllers;

use App\Http\Session;
use App\Model\Poll;
use App\Database;

class PollController
{
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
        header('Location: /result.php');
    }

    public function index()
    {
        include __DIR__ . '/../../../resources/views/index.php';
    }

    public function result($request)
    {
        $results = (new Database())->getAnswers();

        for ($i = 0; $i < 3; $i++) {
            if (empty($results[$i]["COUNT(answer)"])) {
                $results[$i]["COUNT(answer)"] = 0;
            }
        }
        $series = [
            [
                'name' => 'Brands',
                'colorByPoint' => true,
                'data' => [
                    [
                        'name' => '寝る',
                        'y' => (int)$results[0]["COUNT(answer)"],
                    ],
                    [
                        'name' => 'ショッピングに行く',
                        'y' => (int)$results[1]["COUNT(answer)"],
                    ],
                    [
                        'name' => '勉強する',
                        'y' => (int)$results[2]["COUNT(answer)"],
                    ],
                ],
            ],
        ];
        include __DIR__ . '/../../../resources/views/result.php';
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
