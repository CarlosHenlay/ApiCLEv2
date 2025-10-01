<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
 
class Dominio extends Model 
{ 
    use HasFactory; 
    protected $table = 'dominios'; 
    protected $primaryKey = 'dom_Id'; 
    public $timestamps = false; 
 
    protected $fillable = [ 
        'dom_Nom', 
        'dom_Mat1', 
        'dom_Mat2', 
        'dom_Obs', 
    ]; 
 
    public function usuarios() 
    { 
        return $this->hasMany(Usuario::class, 'dom_Id'); 
    } 
 
    public function usuariosAlumnos() 
    { 
        return $this->hasMany(UsuarioAlumno::class, 'dom_Id'); 
    } 
}