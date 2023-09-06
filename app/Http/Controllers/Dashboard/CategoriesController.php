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
        $request = request();
        $categories = Category::with('parent')
            /*leftJoin('categories as parents', 'parents.id', '=', 'categories.parent_id')
            ->select([
                'categories.*',
                'parents.name as parent_name'
            ])*/
            //->withCount('products')
            ->withCount([
                'products as products_number' => function ($query) {
                    $query->where('status', '=', 'active');
                }
            ])
            ->filter($request->query())
            //->withTrashed()
            //->onlyTrashed()
            ->orderBy('categories.name')->paginate(99999);
        /////////////////////////
        //$categories = Category::Active()->paginate();
        //$categories = Category::status('active')->paginate();



        // $categories = Category::paginate();
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
        $request->validate(Category::rules());

        $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);

        $data = $request->except('image');

        $data['image'] = $this->uploadImage($request);

        $categories = Category::create($data);
        return redirect()->route('dashboard.categories.index')
            ->with('success', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('dashboard.categories.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $category = Category::findOrFail($id);
        } catch (Exception $e) {
            return redirect()->route('dashboard.categories.index')
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
        $request->validate(Category::rules($id));

        $category = Category::findOrFail($id);

        $old_image = $category->image;

        $data = $request->except('image');

        $new_image = $this->uploadImage($request);

        if ($new_image) {
            $data['image'] = $new_image;
        }
        $category->update($data);

        if ($old_image && $new_image) {
            Storage::disk('uploads')->delete($old_image);
        }

        return redirect()->route('dashboard.categories.index')
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
        return redirect()->route('dashboard.categories.index')
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


    public function trash()
    {
        $categories = Category::onlyTrashed()->paginate();
        return view('dashboard.categories.trash', compact('categories'));
    }
    public function restore(Request $request, $id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->route('dashboard.categories.trash')->with('success', 'Category restored successfully!');
    }

    public function forceDelete($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        if ($category->image) {
            Storage::disk('uploads')->delete($category->image);
        }
        return redirect()->route('dashboard.categories.trash')->with('success', 'Category deleted forever successfully!');
    }
}
