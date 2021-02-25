<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemoController extends Controller
{
    /**
     * 初期表示
     * @return \Illuminate\Contract\View\Factory\Illuminate\View
     */

    public function index()
    {
        return view('memo');
    }
}
