<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Country;

use Illuminate\Validation\Validator;


use File;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $searchTerm = request()->get('s');
        $authors = Author::latest()->where('title', 'LIKE', "%$searchTerm%")->paginate(15);
    	return view('admin.author.index')
        ->with(compact('authors'));	
    } // end method
    
    public function create()
    {
    	return view('admin.author.create');
    }



    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'slug' => 'required',
	        'designation' => 'required',
	        'dob' => 'required',
	        'email' => 'required',
            'country' => 'required|not_in:none',
            // 'author_img' => 'required|mimes:jpg,jpeg,gif,png|max:2048',
        ]);

        $fileName = null;
        if (request()->hasFile('author_img'))
        {
            $file = request()->file('author_img');
            $fileName = md5($file->getClientOriginalName()). time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }
        else 
        {
            $fileName = 'No image found';
        }


        Author::create([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'designation' => $request->get('designation'),
            'dob' => $request->get('dob'),
            'country' => $request->get('country'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'description' => $request->get('description'),
            'author_feature' => $request->get('author_feature'),
            'facebook_id' => $request->get('facebook_id'),
            'twitter_id' => $request->get('twitter_id'),
            'youtube_id' => $request->get('youtube_id'),
            'pinterest_id' => $request->get('pinterest_id'),
            'author_img' => $fileName,
            'status' => 'DEACTIVE',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        return redirect()->to('/admin/author');

    } // end method
    

    public function edit($id)
    {
        $author = Author::findOrFail($id);
    	return view('admin.author.edit')
        ->with(compact('author'));	
    } // end method

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);
        $currentImage = $author->author_img;

        $fileName = null;
        if (request()->hasFile('author_img'))
        {
            $file = request()->file('author_img');
            $fileName = md5($file->getClientOriginalName()). time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        $author->update([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'designation' => $request->get('designation'),
            'dob' => $request->get('dob'),
            'country' => $request->get('country'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'description' => $request->get('description'),
            'author_feature' => $request->get('author_feature'),
            'facebook_id' => $request->get('facebook_id'),
            'twitter_id' => $request->get('twitter_id'),
            'youtube_id' => $request->get('youtube_id'),
            'pinterest_id' => $request->get('pinterest_id'),
            'author_img' => ($fileName) ? $fileName : $currentImage,
            'status' => 'DEACTIVE',
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        if($fileName)
            File::delete('./uploads' . $currentImage);

    	return redirect()->to('/admin/author');	
    } // end method


    public function delete($id)
    {
        $author = Author::findOrFail($id);
        $currentImage = $author->author_img;
        $author->delete();
        File::delete('./uploads' . $currentImage);
        return redirect()->back()->with('error', 'Author Deleted Successfully');
    }
    public function status($id)
    {
        $author = Author::findOrFail($id);
        $newStatus = $author->status == 'DEACTIVE' ? 'ACTIVE' : 'DEACTIVE';
        $author->update([
            'status' => $newStatus
        ]);
        return redirect()->back()->with('message','Status Updated Successfully');
    }
}
