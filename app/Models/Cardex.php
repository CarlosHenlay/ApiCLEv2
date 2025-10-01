<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
class Cardex extends Model 
{ 
	use HasFactory; 
	protected $table = 'cardex'; 
	protected $primaryKey = 'car_Id'; 
	public $timestamps = false; 
	protected $fillable = [ 
		'alu_Id', 'ret_Id', 'car_Cal', 'car_Per', 'car_An', 'car_Acr', 'car_Obs', 
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