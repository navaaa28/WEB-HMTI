<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $table = 'aspirasi';
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nim',
        'aspirasi',
    ];
    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}