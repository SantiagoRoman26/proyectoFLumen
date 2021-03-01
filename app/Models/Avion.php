<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
    protected $table = 'modelo_avion';
    protected $fillable = [
        'numero', 'capacidad', 'puestos_Disponibles', 'estado'
    ];

    public $timestamps = false;//nose guarda los valores del created_at y update_at

    protected $hidden = [
        'avion_id' 
    ];


}