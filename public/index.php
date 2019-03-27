<?php

session_start();

use App\Http\Session;
use App\Http\Controller\PollController;

require_once __DIR__ . '/../App/Http/Controller/PollController.php';
require_once  __DIR__ . '/../App/functions.php';


$poll = new PollController(new Session());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $poll->store($_REQUEST);
} else {
    $poll->index($_REQUEST);
}

