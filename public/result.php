<?php

require_once  __DIR__ . '/../App/functions.php';

// オフセット配列要素初期化
for ($i = 0; $i < 3; $i++)
{
    if (empty($results[$i]["COUNT(answer)"]))
    {
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

require_once __DIR__ . '/../resourses/result.php';

