<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
class AlumnoPersonal extends Model 
{ 
use HasFactory; 
protected $table = 'alumnospersonales'; 
protected $primaryKey = 'aluPer_Id'; 
public $timestamps = false; 
protected $fillable = [ 
'alu_Id', 'aluPer_TelPer', 'aluPer_TelCasa', 'aluPer_Correo', 
'aluPer_CalleNum', 'aluPer_Col', 'aluPer_Loc', 'min_Id', 'est_Id', 
'aluPer_TipSan', 'aluPer_FechNac', 
'aluPer_NomTut', 'aluPer_TelTut', 
]; 
public function alumno() 
{ 
	return $this->belongsTo(Alumno::class, 'alu_Id');    
} 

public function municipio() 
{ 
	return $this->belongsTo(Municipio::class, 'min_Id'); 
} 

public function estado() 
{ 
	return $this->belongsTo(Estado::class, 'est_Id');
} 

}