<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class ReplyController extends Controller
{
    public function __construct(){
        return $this->middleware(['auth', 'verified']);
    }
}
