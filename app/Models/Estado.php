<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
class Estado extends Model 
{ 
	use HasFactory; 
	protected $table = 'estados'; 
	protected $primaryKey = 'est_id'; 
	public $timestamps = false; 
	protected $fillable = [ 
		'est_Nom', 
	]; 

	public function alumnosPersonales() 
	{ 
		return $this->hasMany(AlumnoPersonal::class, 'est_Id'); 
	} 

	public function docentes() 
	{ 
		return $this->hasMany(Docente::class, 'est_Id'); 
	} 
}
