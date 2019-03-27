<?php

session_start();

use app\Http\Session;
use app\Http\Controllers\PollController;

require_once __DIR__ . '/../app/Http/Controllers/PollController.php';
require_once __DIR__ . '/../app/functions.php';


$poll = new PollController(new Session());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $poll->store($_REQUEST);
} else {
    $poll->index($_REQUEST);
}
