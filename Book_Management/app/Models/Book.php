<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'book_id';

    protected $fillable = [
        'book_name',
        'isbn_code',
        'publisher_year',
        'price',
        'author',
        'image',
    ];

    // Các phương thức và quan hệ khác của class "Book" có thể được thêm vào đây
}
