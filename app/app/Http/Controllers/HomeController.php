<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $file = '/var/www/app/Http/Controllers/HomeController.php';

        if (is_readable($file)) {
            echo $file . "is readable" . PHP_EOL;
        } else {
            echo $file . "is NOT readable" . PHP_EOL;
        }
        if (is_writable($file)) {
            echo $file . "is writable" . PHP_EOL;
        } else {
            echo $file . "is NOT writable" . PHP_EOL;
        }

        echo posix_geteuid() . PHP_EOL;
//        $a = 5;
//        $a +=5;
//        $b = 10;
//        $a = $a + $b;
//        return $a;
//        exit();
        // return view('home');
    }
}
