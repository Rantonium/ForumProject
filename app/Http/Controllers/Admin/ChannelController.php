<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ChannelController extends Controller
{
    public function __construct(){
        return $this->middleware(['AdminCheck', 'auth']);
    }

    public function index()
    {
        return view('admin.channels.index', ['channels' => Channel::all()]);
    }

    public function create()
    {
        return view('admin.channels.create');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, ['name' => ['required', 'unique:channels']]);
        /** @noinspection PhpUndefinedMethodInspection */
        Channel::create(['name' => $request->name, 'slug' => Str::slug($request->name)]);

        return redirect()->route('admin.channels.index')->with('success', 'New Channel Added');
    }

    public function show(Channel $channel)
    {
        //
    }

    public function edit(Channel $channel)
    {
        return view('admin.channels.edit', compact('channel'));
    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request, Channel $channel): RedirectResponse
    {
        $this->validate($request, ['name' => ['required', 'unique:channels']]);
        $channel->update(['name' => $request->name, 'slug' => Str::slug($request->name)]);

        return redirect()->route('admin.channels.index')->with('success', 'Channel Updated');
    }

    public function destroy(Channel $channel): RedirectResponse
    {
        $channel->delete();

        return redirect()->route('admin.channels.index')->with('success', 'Channel Deleted');
    }
}
