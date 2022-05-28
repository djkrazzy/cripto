<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referencias extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_frente_dpi', 'name_emergency', 'name_emergency' ,'bitcoin','banco','numero_cuenta_banco',
        'file', 'nombre_archivo','status','tipo_cuenta','user_id'
    ];

   
    public function user(){
        return $this->belongsTo(User::class);
    }
}
