<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class TagController extends Controller
{
    public function __construct(){
        return $this->middleware(['AdminCheck', 'auth']);
    }

    public function index()
    {
        return view('admin.tags.index', ['tags' => Tag::all()]);
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, ['name' => ['required', 'unique:tags']]);
        /** @noinspection PhpUndefinedMethodInspection */
        Tag::create(['name' => $request->name, 'slug' => Str::slug($request->name)]);

        return redirect()->route('admin.tags.index')->with('success','Tag Created');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request, Tag $tag): RedirectResponse
    {
        $this->validate($request, ['name' => ['required', 'unique:tags']]);
        $tag->update(['name' => $request->name, 'slug' => Str::slug($request->name)]);

        return redirect()->route('admin.tags.index')->with('success','Tag Updated');
    }


    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('success','Tag Deleted');
    }
}
