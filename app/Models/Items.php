<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Items extends Model
{
    protected $fillable = [
        'title',
        'author',
        'tomb_id',
        'publisher',
        'publication_year',
        'category',
        'description',
        'quantity',
        'available_quantity',
        'shelf_location',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'publication_year' => 'integer',
            'quantity' => 'integer',
            'available_quantity' => 'integer',
        ];
    }

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class, 'item_id');
    }
}
