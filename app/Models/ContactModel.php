<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    // Menentukan tabel yang digunakan jika nama model tidak sesuai dengan tabel
    protected $table = 'contacts';

    // Menentukan kolom yang dapat diisi (fillable)
    protected $fillable = ['name', 'phone', 'email'];

    // Menonaktifkan timestamps jika tabel tidak memiliki kolom created_at dan updated_at
    public $timestamps = false;
}
