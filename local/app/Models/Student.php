<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';

    protected $fillable = [
        'user_type',
        'user_id',
        'firstname',
        'middlename',
        'lastname',
        'email',
        'suffix',
        'lrn',
        'house_no_street',
        'baranggay',
        'municipality',
        'province',
        'contact_no',
        'age',
        'birthday',
        'sex',
        'nationality',
        'religion',
        'father',
        'father_occupation',
        'mother',
        'mother_occupation',
        'living_with',
        'no_of_siblings',
        'position',
        'elem_school',
        'last_grade_completed',
        'school_address',
        'school_id',
        'school_year_start',
        'school_year_end',
        'gen_average',
        'current_grade',
        'current_section',
        'current_year_start',
        'current_year_end',
        'adviser',
    ];
}


// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;

// class Student extends Authenticatable
// {
//     use HasFactory, Notifiable;

//     public $timestamps = false;

//     protected $fillable = [
//         'firstname', 'lastname', 'email', 'password',
//     ];

//     protected $hidden = [
//         'password', 'remember_token',
//     ];
// }
