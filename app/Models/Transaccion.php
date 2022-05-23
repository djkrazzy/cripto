<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $fillable =[
        'numero','monto','boleta','user_id', 'tipo','cuenta_id','status','operacion'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cuenta(){
        return $this->belongsTo(Cuenta::class);
    }
}
