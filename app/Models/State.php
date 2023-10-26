<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class State extends Model
{
    use HasFactory;
    protected $table = 'states';

    protected $fillable = ['name', 'code'];

    public function communes(): HasMany
    {
        return $this->hasMany(Commune::class);
    }

    public function structure()
    {
        return $this->hasOne(Structure::class);
    }
}
