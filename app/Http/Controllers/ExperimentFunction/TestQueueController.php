<?php

namespace App\Http\Controllers\ExperimentFunction;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessPodcast;

class TestQueueController extends Controller
{
    public function testCreateQueue()
    {
        ProcessPodcast::dispatch()->delay(5);

        return 'down';
    }
}
