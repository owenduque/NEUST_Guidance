<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concerns extends Model
{
    use HasFactory;

    protected $table = 'student_concern';

    protected $fillable = [
        'request_type',
        'victim_name',
        'victim_age',
        'victim_gender',
        'victim_grade',
        'victim_section',
        'victim_parent_guardian',
        'victim_parent_contact',
        'victim_class_adviser',
        'complainant_name',
        'complainant_address',
        'complainant_contact',
        'relation_to_victim',
        'offender_name',
        'offender_age',
        'offender_gender',
        'offender_grade',
        'offender_section',
        'offender_parent_guardian',
        'offender_parent_contact',
        'offender_class_adviser',
        'date_request',
        'status',
        'date_to_pickup',
        'time_pickup',
    ];

}
