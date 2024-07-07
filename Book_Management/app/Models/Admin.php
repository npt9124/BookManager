<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $primaryKey = 'admin_id';
    protected $table = 'admin';

    protected $fillable = [
        'name',
        'email',
        'gender',

        'password',
        'phone_number',

        'address',
        'birthday',
        'status',
        'last_login_at',
        'logout_at',
    ];
    protected $dates = [
        'last_login_at',
        'logout_at',
    ];
    protected $dispatchesEvents = [
        'login' => login::class,
        'logout' => logout::class,
    ];


    // Các phương thức và quan hệ khác của class "Book" có thể được thêm vào đây
}
