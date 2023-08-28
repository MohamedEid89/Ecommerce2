<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Category::all();
        $category = new Category();
        return view('dashboard.categories.create', compact('parents', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);

        $data = $request->except('image');

        $data['image'] = $this->uploadImage($request);

        $categories = Category::create($data);
        return redirect()->route('categories.index')
            ->with('success', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $category = Category::findOrFail($id);
        } catch (Exception $e) {
            return redirect()->route('categories.index')
                ->with('warning', 'Record not found!');
        }

        $parents = Category::where('id', '<>', $id)
            ->where(function ($query) use ($id) {
                $query->whereNull('parent_id')
                    ->orWhere('parent_id', '<>', $id);
            })
            ->get();
        return view(
            'dashboard.categories.edit',
            compact('category', 'parents')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $old_image = $category->image;

        $data = $request->except('image');

        $data['image'] = $this->uploadImage($request);

        $category->update($data);

        if ($old_image && $data['image']) {
            Storage::disk('uploads')->delete($old_image);
        }

        return redirect()->route('categories.index')
            ->with('success', 'Category updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Category::destroy($id);
        $category = Category::findOrFail($id);
        $category->delete();

        if ($category->image) {
            Storage::disk('uploads')->delete($category->image);
        }
        return redirect()->route('categories.index')
            ->with('success', 'Category deleted Successfully');
    }

    protected function uploadImage(Request $request)
    {
        if (!$request->hasFile('image')) {
            return;
        }
        $file = $request->file('image');
        $path = $file->store('categories', [
            'disk' => 'uploads'
        ]);
        return $path;
    }
}
