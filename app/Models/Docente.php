<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
class Docente extends Model 
{ 
use HasFactory; 
protected $table = 'docentes'; 
protected $primaryKey = 'doc_Id'; 
public $timestamps = false; 
protected $fillable = [ 
'doc_Nom', 'doc_AppPat', 'doc_AppMat', 'doc_Ges', 'doc_ComEst', 
'doc_TelPer', 'doc_TelCasa', 'doc_Correo', 'doc_CalleNum', 'doc_Col', 
'doc_Loc', 'min_Id', 'est_Id', 'doc_FechIng', 'doc_Obs', 'usu_Id', 
]; 
public function municipio() 
{ 
	return $this->belongsTo(Municipio::class, 'min_Id'); 
} 

public function estado() 
{ 
	return $this->belongsTo(Estado::class, 'est_Id'); 
} 

public function usuario() 
{ 
	return $this->belongsTo(Usuario::class, 'usu_Id'); 
} 

public function grupos() 
{ 
	return $this->hasMany(Grupo::class, 'doc_Id');
} 

}