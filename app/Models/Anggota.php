<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable = ['nama', 'email', 'alamat', 'foto', 'departemen', 'jabatan', 'divisi'];

}
