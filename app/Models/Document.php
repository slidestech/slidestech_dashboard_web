<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url'];

    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class, 'questions_documents', 'document_id', 'question_id');
    }

    
}
