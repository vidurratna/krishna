<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KrishnaController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
