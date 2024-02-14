<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{

    use HasFactory, SoftDeletes;

    protected $table = 'departments';
    /**
     * Get the Faculty that owns the Department
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function faculties(): BelongsTo
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }
}
