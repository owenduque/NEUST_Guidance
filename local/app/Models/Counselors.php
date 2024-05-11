<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counselors extends Model
{
    use HasFactory;

    protected $table = 'counselor';

    protected $fillable = [
        'user_type',
        'firstname',
        'middlename',
        'surname',
        'email',
        'password',
    ];

}
