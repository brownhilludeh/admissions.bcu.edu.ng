<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'classes';

    /**
     * Get the Divide that owns the ClassModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function divide(): BelongsTo
    {
        return $this->belongsTo(Divide::class, 'divide_id', 'id');
    }
}
