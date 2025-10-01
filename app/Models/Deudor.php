<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
 
class Deudor extends Model 
{ 
    use HasFactory; 
    protected $table = 'deudores'; 
    protected $primaryKey = 'deu_Id'; 
    public $timestamps = false; 
 
    protected $fillable = [ 
        'alu_Id', 
        'deu_Con', 
        'deu_Fech', 
        'deu_Per', 
        'deu_An', 
        'deu_Obs', 
    ]; 
 
    public function alumno() 
    { 
        return $this->belongsTo(Alumno::class, 'alu_Id'); 
    } 
}