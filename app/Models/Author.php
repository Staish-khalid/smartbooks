<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Validator;


class Author extends Model
{
    use HasFactory;
    protected $table = 'author';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function author_books()
    {
    	return $this->hasMany(Books::class, 'author_id', 'id');
    }
}
