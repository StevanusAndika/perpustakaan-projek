<?php
// app/Models/Category.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris'; // ini yang penting

    protected $fillable = [
        'nama',
        'deskripsi',
        'created_by',
        'updated_by',
    ];

    public $incrementing = true; // karena kamu pakai $table->id()
}
