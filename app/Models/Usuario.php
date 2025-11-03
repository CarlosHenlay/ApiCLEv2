<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Usuario extends Authenticatable implements JWTSubject
{ 
    use HasFactory; 
    
    protected $table = 'usuarios'; 
    protected $primaryKey = 'usu_Id'; 
    public $timestamps = false; 
    
    protected $fillable = [ 
        'usu_Nom', 
        'usu_Pas', 
        'usu_Clas', 
        'dom_Id', 
    ];

    protected $hidden = [
        'usu_Pas',
    ];

    public function getAuthPassword()
    {
        return $this->usu_Pas;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
            'usu_Clas' => $this->usu_Clas,
            'dom_Id' => $this->dom_Id,
            'rol' => $this->dominio->rol ?? 'sin_rol',
        ];
    }
    
    public function dominio() 
    { 
        return $this->belongsTo(Dominio::class, 'dom_Id'); 
    } 
    
    public function docentes() 
    { 
        return $this->hasMany(Docente::class, 'usu_Id'); 
    }

    public function tieneRol($rol)
    {
        return $this->dominio && $this->dominio->rol === $rol;
    }

    public function esAdmin()
    {
        return $this->tieneRol('admin');
    }

    public function esControlEscolar()
    {
        return $this->tieneRol('control_escolar');
    }
}