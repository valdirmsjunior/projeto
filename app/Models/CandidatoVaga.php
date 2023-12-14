<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidatoVaga extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'candidatos_vagas';

    protected $primary_key = 'id';

    public $incrementing = true;

    public $timestamps = true;

    protected $fillable = ['usuario_id', 'vaga_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vaga()
    {
        return $this->belongsTo(Vaga::class);
    }

}
