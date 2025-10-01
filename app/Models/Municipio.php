<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 

class Municipio extends Model 
{ 
	use HasFactory; 

	protected $table = 'municipios'; 
	protected $primaryKey = 'mun_id'; 
	public $timestamps = false; 
	protected $fillable = [ 
		'mun_Nom', 
	]; 

	public function alumnosPersonales() 
	{ 
		return $this->hasMany(AlumnoPersonal::class, 'min_Id'); 
	} 

	public function docentes() 
	{ 
		return $this->hasMany(Docente::class, 'min_Id'); 
	} 
}
