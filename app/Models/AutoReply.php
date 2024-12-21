<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoReply extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika nama tabel sudah sesuai dengan nama model)
    protected $table = 'auto_replies';

    // Kolom yang dapat diisi (mass assignment)
    protected $fillable = [
        'keyword',
        'response',
    ];

    // Tambahkan timestamp jika tabel menggunakan kolom `created_at` dan `updated_at`
    public $timestamps = true;

    /**
     * Scope untuk mencari berdasarkan keyword.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $keyword
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchByKeyword($query, $keyword)
    {
        if (!empty($keyword)) {
            return $query->where('keyword', 'LIKE', '%' . $keyword . '%');
        }

        return $query;
    }
}
