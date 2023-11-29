<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    use HasFactory;

    public function logs(): HasMany
    {
        return $this->hasMany(Log::class, 'person_identifier', 'identifier');
    }
}
