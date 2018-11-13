<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        $tasks = [
            ['task' => 'Start learning Laravel', 'completed' => true],
            ['task' => 'Keep learning Vue', 'completed' => true],
            ['task' => 'Keep learning Postgres', 'completed' => false],
            ['task' => 'Keep learning Redis', 'completed' => false],
            ['task' => 'Keep learning modern HTML/CSS', 'completed' => true],
            ['task' => 'Stay calm', 'completed' => false]
        ];

        return view('home', ['tasks' => $tasks]);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
