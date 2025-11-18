<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str as SupportStr;
use Psy\Util\Str as UtilStr;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::latest()->paginate(30);
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:120|unique:tags,name',
        ]);

        Tag::create([
            'name' => $request->name,
            'slug' => SupportStr::slug($request->name),
        ]);
        return redirect()->route('admin.tags.index')->with('success', 'Tag created.');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:120|unique:tags,name,' . $tag->id,
        ]);

        $tag->update([
            'name' => $request->name,
            'slug' => SupportStr::slug($request->name),
        ]);
        return redirect()->route('admin.tags.index')->with('success', 'Tag updated.');
    }

    public function destroy(Tag $tag)
    {
        $tag->newsletters()->detach();
        $tag->delete();

        return back()->with('success', 'Tag deleted.');
    }
}
