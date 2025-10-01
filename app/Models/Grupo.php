<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
 
class Grupo extends Model 
{ 
    use HasFactory; 
    protected $table = 'grupos'; 
    protected $primaryKey = 'gru_Id'; 
    public $timestamps = false; 
 
    protected $fillable = [ 
        'ret_Id', 
        'gru_Cgr', 
        'doc_Id', 
        'gru_Lim', 
        'gru_Can', 
        'gru_HLu', 
        'gru_ALu', 
        'gru_HMa', 
        'gru_AMa', 
        'gru_HMi', 
        'gru_AMi', 
        'gru_HJu', 
        'gru_AJu', 
        'gru_HVi', 
        'gru_AVi', 
        'gru_HSa', 
        'gru_ASa', 
        'gru_Des', 
        'gru_Cla', 
    ]; 
public function reticula() 
{ 
    return $this->belongsTo(Reticula::class, 'ret_Id'); 
} 

public function docente() 
{ 
    return $this->belongsTo(Docente::class, 'doc_Id'); 
} 

public function inscripciones() 
{ 
    return $this->hasMany(Inscripcion::class, 'gru_Id');
} 

}