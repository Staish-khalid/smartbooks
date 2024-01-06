<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Media;
use App\Models\Author;
use App\Models\Books;
use App\Models\Category;

use Illuminate\Validation\Validator;


class MainController extends Controller
{
    public function index()
    {
		$sliders = Media::where(['status' => 'ACTIVE', 'media_type' => 'slider'])->get();
		$upcoming_books = Books::where('status', 'UPCOMING')->limit(5)->get();
		$downloaded_books = Books::with('author', 'category')->orderBy('downloaded', 'DESC')->get();
        $recommended_books = Books::where('recommended', '1')->get();
		$categories = Category::where('status', 'ACTIVE')->get();
        $books = Books::with('author')->where('status', 'ACTIVE')->paginate(20);
        $author_feature = Author::where(['status' => 'ACTIVE', 'author_feature' => 'yes'])->inRandomOrder()->first();
        $galleries = Media::where(['status' => 'ACTIVE', 'media_type' => 'gallery'])->limit(6)->get();
        return view('index', compact('sliders', 'upcoming_books', 'downloaded_books', 'recommended_books', 'categories', 'books', 'author_feature', 'galleries'));
    }
    public function about()
    {
        $teams = Team::where('status', 'ACTIVE')->get();
        return view('pages.about', compact('teams'));
    }

}
