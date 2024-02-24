<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Programme extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * Get all of the colleges for the Programme
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function colleges(): HasMany
    {
        return $this->hasMany(College::class, 'id', 'college_id');
    }
}
