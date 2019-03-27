<?php

session_start();

use App\Http\Session;
use App\Http\Controllers\PollController;

require_once __DIR__ . '/../app/Http/Controllers/PollController.php';
require_once __DIR__ . '/../app/functions.php';

$poll = new PollController(new Session());
$poll->result($_REQUEST);
