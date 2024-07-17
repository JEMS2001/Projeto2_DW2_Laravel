<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    use HasFactory;

    protected $fillable = ['curso_id', 'data_inscricao'];
    protected $table = 'inscricoes';

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}