<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
class Alumno extends Model 
{ 
use HasFactory; 
protected $table = 'alumnos'; 
protected $primaryKey = 'alu_Id'; 
public $timestamps = false; 
protected $fillable = [ 
'alu_NumCtr', 'alu_Curp',  'alu_Nom', 'alu_AppPat', 'alu_AppMat', 'alu_Sexo', 
'pla_Id', 'alu_Sta', 'alu_Sem', 'alu_IngPer', 'alu_IngAn', 'alu_Ins', 'alu_FinPer', 
'alu_finAn', 'alu_MotBaja', 'alu_PerBaja', 'alu_AnBaja', 'tab_Id', 'usuAlu_Id', 
]; 
public function planEstudio() 
{ 
	return $this->belongsTo(PlanEstudio::class, 'pla_Id'); 
} 

public function tabuladorPago() 
{ 
	return $this->belongsTo(TabuladorPago::class, 'tab_Id'); 
} 

public function usuarioAlumno() 
{ 
	return $this->belongsTo(UsuarioAlumno::class, 'usuAlu_Id'); 
} 

public function alumnoPersonal() 
{ 
	return $this->hasOne(AlumnoPersonal::class, 'alu_Id'); 
} 

public function cardex() 
{ 
	return $this->hasMany(Cardex::class, 'alu_Id'); 
} 

public function deudores() 
{ 
	return $this->hasMany(Deudor::class, 'alu_Id'); 
} 

public function historicoPagos() 
{ 
	return $this->hasMany(HistoricoPago::class, 'alu_Id');
} 


}