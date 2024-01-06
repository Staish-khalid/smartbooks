<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $searchTerm = request()->get('s');
        $categories = Category::where('title', 'LIKE', "%$searchTerm%")->paginate(15);
        return view('admin.category.index')
        ->with(compact('categories'));
    }
    public function create()
    {
        return view('admin.category.create');
    }

    public function store (Request $request)
    {
        Category::create([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'description' => $request->get('description'),
            'status' => 'DEACTIVE',
            'created_by' => '1',
            'updated_by' => '1'
        ]);
        return redirect()->to('admin/category');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.edit')->with(compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'description' => $request->get('description'),
            'status' => $category->status,
            'created_by' => '1',
            'updated_by' => '1'
        ]);
        return redirect()->to('admin/category');
    }


    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back();
    }
    public function status($id)
    {
        $category = Category::findOrFail($id);
        $newStatus = ($category->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
        $category->update([
            'status' => $newStatus
        ]);
        return redirect()->back();

    }
}
