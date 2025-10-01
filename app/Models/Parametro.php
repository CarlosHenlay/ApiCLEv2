<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
class Parametro extends Model 
{ 
	use HasFactory; 
	protected $table = 'parametros'; 
	protected $primaryKey = 'par_Id'; 
	public $timestamps = false; 
	protected $fillable = [ 
		'par_NomPar', 
		'par_Val1', 
		'par_Val2', 
		'par_Val3', 
		'par_Obs', 
	];
}