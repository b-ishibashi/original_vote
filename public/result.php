<?php

use \App\Database;
require_once __DIR__ . '/../App/Database/Database.php';
require_once  __DIR__ . '/../App/functions.php';


$answer = new Database();
$results = $answer->get_answers();

$result = [(int)$results[0][0], (int)$results[1][0], (int)$results[2][0]];

$series = [
    [
        'name' => 'Brands',
        'colorByPoint' => true,
        'data' => [
            [
                'name' => '寝る',
                'y' => $result[0][0],
            ],
            [
                'name' => 'ショッピングに行く',
                'y' => $result[1][0],
            ],
            [
                'name' => '勉強する',
                'y' => $result[2][0],
            ],
        ],
    ],
];

require_once __DIR__ . '/../resourses/result.php';

