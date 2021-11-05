<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcAccident extends Model
{
    use HasFactory;
    protected $primaryKey = 'ac_id';
    protected $fillable = ['ac_id','ac_type','ac_severity','ac_description','us_id'];
}
