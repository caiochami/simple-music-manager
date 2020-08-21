<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Carbon\Carbon;


class User extends Authenticatable
{
    use Notifiable;

    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'birthday'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getPresentedBirthdayAttribute(){
        return Carbon::parse($this->birthday);
    }

    public function getPresentedGenderAttribute(){
        switch ($this->gender) {
            case 'male':
                return 'Masculino';
                break;
                case 'female':
                    return 'Feminino';
                    break;
            
            default:
                'Não definido';
                break;
        }
    }

}
