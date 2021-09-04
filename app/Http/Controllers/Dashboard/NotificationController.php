<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','verified']);
    }

    public function index(){
        return view('dashboard.notifications.index');
    }
}
