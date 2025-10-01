<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
class PlanEstudio extends Model 
{ 
use HasFactory; 
protected $table = 'planestudios'; 
protected $primaryKey = 'pla_Id'; 
public $timestamps = false; 

protected $fillable = [ 
  'pla_CveInt', 'pla_Nom', 'pla_CveOfi', 'pla_Fei', 'pla_Fef', 'pla_sta', 
  'pla_cmod', 
]; 
public function alumnos() 
{ 
	return $this->hasMany(Alumno::class, 'pla_Id'); 
} 

public function reticulas() 
{ 
	return $this->hasMany(Reticula::class, 'pla_Id');
} 

}