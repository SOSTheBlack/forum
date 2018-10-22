<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\View\View;

use function view;

/**
 * Class ThreadsController.
 *
 * @package App\Http\Controllers
 */
class ThreadsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $threads = Thread::all();

        return view('threads.index', compact('threads'));
    }

    /**
     * @param \App\Thread $thread
     *
     * @return \Illuminate\View\View
     */
    public function show(Thread $thread): View
    {
        return view('threads.show', compact('thread'));
    }
}
