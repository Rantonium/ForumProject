<?php

namespace App\Http\Controllers;


class PageController extends Controller
{

    public function users()
    {
        return view('admin.users.index');
    }

    public function categoriesIndex()
    {
        return view('admin.channels.index');
    }

    public function categoriesCreate()
    {
        return view('admin.channels.create');
    }

    public function threadsIndex()
    {
        return view('admin.threads.index');
    }
}
