<?php

namespace App\Http\Controllers;

use App\Models\listall;

class binController extends Controller
{
    public function index()
    {

        $listall = listall::paginate(10);
        return view('page.slip', compact('listall'));
    }
}
