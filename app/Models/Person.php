<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'tax_identifier',
        'fullname',
        'identifier',
        'other_identifier',
        'login',
        'logout',
        'email',
    ];

    public function log(): HasOne
    {
        return $this->hasOne(Log::class, 'person_identifier', 'identifier');
    }

}
