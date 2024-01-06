<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Pagination\Paginator;
use File;


class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
        $categories = Category::get();
        $authors = Author::get();
        $searchTerm = request()->get('s');
        $books = books::latest()->where('title', 'LIKE', "%$searchTerm%")->paginate(15);
        return view('admin.book.index')
        ->with(compact('categories', 'authors', 'books'));
    }
    public function create()
    {
        $book = Books::get();
        $categories = Category::get();
        $authors = Author::get();
        return view('admin.book.create')
        ->with(compact('categories', 'authors', 'book'));
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'slug' => 'required',
        //     'rating' => 'required',
        //     'category' => 'required',
        // ]);

        $fileName = null;
        if(request()->hasfile('book_img'))
        {
            $file = request()->file('book_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        $bookCover = null;
        if(request()->hasfile('book_upload'))
        {
            $file = request()->file('book_upload');
            $bookCover = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $bookCover);
        }

        Books::create([
            'category_id' => $request->get('category_id'),
            'author_id' => $request->get('author_id'),
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'availability' => $request->get('availability'),
            'price' => $request->get('price'),
            'rating' => $request->get('rating'),
            'publisher' => $request->get('publisher'),
            'country_of_publisher' => $request->get('country_of_publisher'),
            'isbn' => $request->get('isbn'),
            'isbn-10' => $request->get('isbn-10'),
            'audience' => $request->get('audience'),
            'format' => $request->get('format'),
            'language' => $request->get('language'),
            'total_pages' => $request->get('total_pages'),
            'downloaded' => $request->get('downloaded'),
            'edition_number' => $request->get('edition_number'),
            'recommended' => $request->get('recommended'),
            'Description' => $request->get('Description'),
            'book_img' => $fileName,
            'book_upload' => 'No Image fount',
            'status' => 'DEACTIVE',
            'created_by' => '1',
            'updated_by' => '1'
        ]);
        return redirect()->to('admin/book')->with('message','book Added Successfully');

    }
    public function edit($id)
    {
        $book = Books::findOrFail($id);
        $categories = Category::get();
        $authors = Author::get();
        return view('admin.book.edit')
        ->with(compact('book', 'categories', 'authors'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'slug' => 'required',
        //     'rating' => 'required',
        //     'category' => 'required',
        // ]);

        $book = Books::findOrFail($id);
        $currentImage = $book->book_img;
        $newBookCover = $book->book_upload;

        $fileName = null;
        if(request()->hasfile('book_img'))
        {
            $file = request()->file('book_img');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $fileName);
        }

        $bookCover = null;
        if(request()->hasfile('book_upload'))
        {
            $file = request()->file('book_upload');
            $bookCover = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/', $bookCover);
        }

        $book->update([
            'category_id' => $request->get('category_id'),
            'author_id' => $request->get('author_id'),
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'availability' => $request->get('availability'),
            'price' => $request->get('price'),
            'rating' => $request->get('rating'),
            'publisher' => $request->get('publisher'),
            'country_of_publisher' => $request->get('country_of_publisher'),
            'isbn' => $request->get('isbn'),
            'isbn-10' => $request->get('isbn-10'),
            'audience' => $request->get('audience'),
            'format' => $request->get('format'),
            'language' => $request->get('language'),
            'total_pages' => $request->get('total_pages'),
            'downloaded' => $request->get('downloaded'),
            'edition_number' => $request->get('edition_number'),
            'recommended' => $request->get('recommended'),
            'Description' => $request->get('Description'),
            'book_img' => ($fileName) ? $fileName : $currentImage,
            'book_upload' => ($bookCover) ? $bookCover : $newBookCover,
            'status' => 'DEACTIVE',
            'created_by' => '1',
            'updated_by' => '1'
        ]);
        return redirect()->to('admin/book')->with('message','book Added Successfully');

    }


    public function status($id)
    {
        $book = Books::findOrFail($id);
        $newStatus = ($book->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
        $book->update([
            'status' => $newStatus
        ]);
        return redirect()->back();
    }public function delete($id)
    {
        $book = Books::findOrFail($id);
        $book->delete();
        return redirect()->back();
    }
}


