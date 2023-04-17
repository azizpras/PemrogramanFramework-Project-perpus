<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['rak'];
    protected $fillable = ['judul', 'pengarang', 'penerbit', 'thn_terbit', 'rak_id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%');
        });
    }

    public function rak() :BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
