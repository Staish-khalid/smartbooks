<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Author;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $searchTerm = request()->get('s');
        $medias = media::latest()->where('title', 'LIKE', "%$searchTerm%")->paginate(15);
        return view('admin.media.index')->with(compact('medias'));

    }
    public function create()
    {
        $authors = Author::get();
        return view('admin.media.create')->with(compact('authors'));
    }
    public function store(Request $request)
    {
        $fileName = null;
        if (request()->hasfile('media_img'))
        {
            $file = request()->file('media_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads', $fileName);       
        }
        Media::create([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'media_type' => $request->get('media_type'),
            'media_img' => $fileName,
            'description' => $request->get('description'),
            'status' => 'DEACTIVE',
            'created_by' => '1',
            'updated_by' => '1'

        ]);
        return redirect()->to('admin/media');
    }
    public function edit($id)
    {
        $media = Media::findOrFail($id);
        return view('admin.media.edit')->with(compact('media'));
    }  

    public function update(Request $request, $id)
    {
        $media = Media::findOrFail($id);
        $fileName = null;
        $currentImage = $media->media_img;

        if (request()->hasfile('media_img')){
            $file = request()->file('media_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName );
        }
        

        $media->update([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'media_type' => $request->get('media_type'),
            'media_img' => ($fileName) ? $fileName : $currentImage,
            'description' => $request->get('description'),
            'status' => 'DEACTIVE',
            'created_by' => '1',
            'updated_by' => '1'

        ]);
        return redirect()->to('admin/media');
    }

    public function status($id)
    {
        $media = Media::findOrFail($id);
        $newStatus = ($media->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
        $media->update([
            'status' => $newStatus
        ]);
        return redirect()->back();
    }  
    public function delete($id)
    {
        $media = Media::findOrFail($id);
        $media->delete();
        return redirect()->back();
    }   
}
