<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Employe extends Model
{
    public $timestamps = true;
    protected $fillable = ['first_name', 'last_name', 'birth_date', 'gender', 'adresse', 'phone', 'email_address', 'position', 'office', 'start_date', 'salary', 'created_at', 'updated_at'];

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birth_date'])->age;
    }
}
