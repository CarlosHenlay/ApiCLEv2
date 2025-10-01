<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
class Inscripcion extends Model 
{ 
	use HasFactory; 
	protected $table = 'inscripciones'; 
	protected $primaryKey = 'ins_Id'; 
	public $timestamps = false; 
	protected $fillable = [ 
		'ins_Ctr', 'gru_Id', 'ins_Fech', 'ins_Rec', 'ins_Mon', 'ins_Per', 'ins_An', 
		'ins_P1', 'ins_P2', 'ins_P3', 'ins_P4', 'ins_PF', 'ins_Obs', 
	]; 
	public function grupo() 
	{ 
		return $this->belongsTo(Grupo::class, 'gru_Id');
	}
}