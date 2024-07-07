<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;

    protected $primaryKey = 'reader_id';

    protected $fillable = [
        'name',
        'email',
        'address',
        'gender',
        'phone_number',
        'total_num_books_borrowed',
        'birthday',
        'status',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class, 'reader_id');
    }
    // Các phương thức và quan hệ khác của class "Reader" có thể được thêm vào đây
}
