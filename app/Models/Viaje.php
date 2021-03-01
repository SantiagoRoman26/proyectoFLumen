<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
    protected $table = 'modelo_viaje';
    protected $fillable = [
        'numero', 'destino', 'fechaViaje', 'fechaLlegada' , 'estado','avion_id'
    ];

    public $timestamps = false;//nose guarda los valores del created_at y update_at

    protected $hidden = [
        'viaje_id' 
    ];


}