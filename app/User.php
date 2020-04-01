<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Hash;
use Request;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
*/
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $fillable = ['name', 'email', 'id_grupo', 'password', 'remember_token','identificacion','apellido','edad','sexo','telefono','representante','telefono_represen','perfil']; 
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    
/*    
    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
*/

	public static function getFullName()
	{
		#User::select(DB::raw("CONCAT(name,' ', apellido) AS name"),'id')->get()->pluck('name','id');
	    return self::select(DB::raw("CONCAT(name,' ', apellido) AS name"),'id')->get()->pluck('name','id');
	}    

    public function matricula()
    {
		return $this->belongsTo('App\Matricula', 'id', 'id_user');
    }

    public function materia()
    {
		return $this->belongsTo('App\Materia', 'id', 'id_user');
    }

    public function curso()
    {
		return $this->belongsTo('App\Curso', 'id', 'id_user');
    }	
    
}
