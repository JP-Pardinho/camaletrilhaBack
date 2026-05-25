<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{
<<<<<<< Updated upstream
    use HasFactory;
    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contato', 'mensagem'];
=======
    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contatos_id', 'mensagem'];
>>>>>>> Stashed changes
}
