<?php

namespace App\Http\Controllers;


class PageController extends Controller
{

    public function single()
    {
        return view('threads.show');
    }

    public function create()
    {
        return view('threads.create');
    }

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
