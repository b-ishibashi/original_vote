<?php

use \App\Database;
require_once __DIR__ . '/../App/Database/Database.php';
require_once  __DIR__ . '/../App/functions.php';


$answer = new Database();
$results = $answer->getAnswers();

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

require_once __DIR__ . '/../resourses/result.php';

