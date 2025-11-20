<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::with(['categories', 'tags'])->get();

        return view('admin.newsletters.index', compact('newsletters'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags       = Tag::all();

        return view('admin.newsletters.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'categories'  => 'required|array',
            'categories.*' => 'exists:categories,id',
            'tags'        => 'nullable|array',
            'tags.*'      => 'exists:tags,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Generate slug
        $slug = Str::slug($request->title);

        $data = [
            'title'   => $request->title,
            'content' => $request->input('content'),
            'slug'    => $slug,
        ];

        // Image Upload
        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/newsletters'), $filename);
            $data['image'] = $filename;
        }

        // Create newsletter
        $newsletter = Newsletter::create($data);

        // Attach categories & tags
        $newsletter->categories()->sync($request->categories);
        $newsletter->tags()->sync($request->tags ?? []);

        return redirect()->route('admin.newsletters.index')
            ->with('success', 'Newsletter created successfully!');
    }

    // Route Model Binding uses: admin/newsletters/{newsletter}/edit
    public function edit(Newsletter $newsletter)
    {
        $categories = Category::all();
        $tags       = Tag::all();

        return view('admin.newsletters.edit', compact('newsletter', 'categories', 'tags'));
    }

    public function update(Request $request, Newsletter $newsletter)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'categories'  => 'required|array',
            'categories.*' => 'exists:categories,id',
            'tags'        => 'nullable|array',
            'tags.*'      => 'exists:tags,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Update slug too
        $slug = Str::slug($request->title);

        $data = [
            'title'   => $request->title,
            'content' => $request->input('content'),
            'slug'    => $slug
        ];

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($newsletter->image && file_exists(public_path('uploads/newsletters/' . $newsletter->image))) {
                unlink(public_path('uploads/newsletters/' . $newsletter->image));
            }

            // Save new image
            $filename = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/newsletters'), $filename);
            $data['image'] = $filename;
        }


        // Update newsletter
        $newsletter->update($data);

        // Sync relations
        $newsletter->categories()->sync($request->categories);
        $newsletter->tags()->sync($request->tags ?? []);

        return redirect()->route('admin.newsletters.index')
            ->with('success', 'Newsletter updated successfully!');
    }

    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();

        return back()->with('success', 'Newsletter deleted successfully!');
    }
}
