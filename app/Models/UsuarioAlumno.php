<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
class UsuarioAlumno extends Model 
{ 
    use HasFactory; 
    protected $table = 'usuariosalumnos'; 
    protected $primaryKey = 'usuAlu_Id'; 
    public $timestamps = false; 
    protected $fillable = [ 
     'usuAlu_Nom', 
     'usuAlu_Pas', 
     'dom_Id', 
    ]; 
    public function dominio() 
    { 
	 return $this->belongsTo(Dominio::class, 'dom_Id'); 
    } 

    public function alumnos() 
    { 
	 return $this->hasMany(Alumno::class, 'usuAlu_Id'); 
    } 

}