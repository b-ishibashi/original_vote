<?php

session_start();

use App\Http\Session;
use App\Http\Controllers\PollController;

require_once __DIR__ . '/../vendor/autoload.php';

$poll = new PollController(new Session());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $poll->store($_REQUEST);
} else {
    $poll->index($_REQUEST);
}
