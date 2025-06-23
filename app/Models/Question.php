<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['text']; // Permite atribuição em massa do campo 'text'

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
