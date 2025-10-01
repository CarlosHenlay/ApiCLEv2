<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
class Reticula extends Model 
{ 
	use HasFactory; 
	protected $table = 'reticula'; 
	protected $primaryKey = 'ret_Id'; 
	public $timestamps = false; 
	protected $fillable = [ 
		'ret_Mod',  'ret_Nom',  'ret_Ord',  'pla_Id'
	]; 

	public function planEstudio() 
	{ 
		return $this->belongsTo(PlanEstudio::class, 'pla_Id'); 
	} 

	public function cardex() 
	{ 
		return $this->hasMany(Cardex::class, 'ret_Id'); 
	} 

	public function grupos() 
	{ 
		return $this->hasMany(Grupo::class, 'ret_Id'); 
	} 

	public function historicoPagos() 
	{ 
		return $this->hasMany(HistoricoPago::class, 'ret_Id');
	} 
}