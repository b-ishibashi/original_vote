<?php

session_start();

use App\Http\Session;

require_once __DIR__ . '/../App/Http/Controller/PollController.php';
require_once  __DIR__ . '/../App/functions.php';


use App\Http\Controller\PollController;

$poll = new PollController(new Session());


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $poll->post($_REQUEST);
}

require __DIR__ . '/../resourses/index.php';