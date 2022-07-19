<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = ['lesson_id', 'status', 'description'];

    public $statusOptions=[
        'P' => 'Pendente, Aguardando resposta de professor',
        'A' => 'Aguardando resposta do Aluno',
        'C' => 'Concluída',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }

    public function replies(){
        return $this->hasMany(ReplySupport::class);
    }
}
