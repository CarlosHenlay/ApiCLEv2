<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
class TabuladorPago extends Model 
{ 
	use HasFactory; 

	protected $table = 'tabuladorpagos'; 
	protected $primaryKey = 'tab_Id'; 
	public $timestamps = false; 
	protected $fillable = [ 
		'tab_NomTab', 
		'tab_Mon', 
		'tab_Obs', 
	]; 

	public function alumnos() 
	{ 
		return $this->hasMany(Alumno::class, 'tab_Id'); 
	} 
}
