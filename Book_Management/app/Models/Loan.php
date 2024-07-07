<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Reader;
class Loan extends Model
{

    use HasFactory;

    protected $primaryKey = 'loan_id';
    protected $table = 'loan';
    protected $fillable = [

        'borrowed_day',
        'return_day',
        'num_books_on_loan',
        'phone_number',
    ];

    public function reader()
    {
        return $this->belongsTo(Reader::class, 'reader_id');
    }
}
