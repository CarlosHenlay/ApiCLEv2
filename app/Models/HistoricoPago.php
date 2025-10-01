<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
class HistoricoPago extends Model 
{ 
	use HasFactory; 

	protected $table = 'historicopagos'; 
	protected $primaryKey = 'hisPa_Id'; 
	public $timestamps = false; 
	protected $fillable = [ 
		'alu_Id', 'ret_Id', 'hisPa_Fech', 'hisPa_Rec', 'hisPa_Mon', 'hisPa_Per', 
		'hisPa_An', 
	]; 

	public function alumno() 
	{ 
		return $this->belongsTo(Alumno::class, 'alu_Id'); 
	} 

	public function reticula() 
	{ 
		return $this->belongsTo(Reticula::class, 'ret_Id');
	}
}