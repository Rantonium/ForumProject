<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct(){
        return $this->middleware(['AdminCheck', 'auth']);
    }
    public function index(){
        return view('admin.dashboard.index');
    }
}
