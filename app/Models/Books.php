<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function author()
    {
    	return $this->belongsTo(Author::class, 'author_id', 'id');
    }
}
