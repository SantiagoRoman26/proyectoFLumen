<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
    protected $table = 'modelo_cliente';
    protected $fillable = [
        'cedula', 'nombres', 'apellidos', 'genero',  'correo', 'celular','date_created', 'avion_id'
    ];

    public $timestamps = false;//nose guarda los valores del created_at y update_at

    protected $hidden = [
        'cliente_id' 
    ];


}