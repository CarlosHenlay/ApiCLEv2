<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
 
class Usuario extends Model 
{ 
    use HasFactory; 
    protected $table = 'usuarios'; 
    protected $primaryKey = 'usu_Id'; 
    public $timestamps = false; 
    protected $fillable = [ 
        'usu_Nom', 
        'usu_Pas', 
        'usu_Clas', 
        'dom_Id', 
    ]; 
    public function dominio() 
    { 
        return $this->belongsTo(Dominio::class, 'dom_Id'); 
    } 
    public function docentes() 
    { 
        return $this->hasMany(Docente::class, 'usu_Id'); 
    } 
}