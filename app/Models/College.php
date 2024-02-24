<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class College extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get all of the programmes for the College
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function programmes(): HasMany
    // {
    //     return $this->hasMany(Programme::class, 'college_id', 'id');
    // }
}
