<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Producto;
class Detalle extends Model
{
    use HasFactory;
    protected $table='detalle';
    protected $primaryKey='iddetalle';
    public $timestamps=false;
    protected $fillable=['idcliente','idproducto'];

    public function cliente()
    {
      return $this->belongsTo(Cliente::class,'idcliente');
    }
    public function producto()
    {
      return $this->belongsTo(Producto::class,'idproducto');
    }
}
