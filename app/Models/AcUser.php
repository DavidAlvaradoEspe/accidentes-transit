<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcUser extends Model
{
    use HasFactory;
    protected $primaryKey = 'us_id';
    protected $fillable = ['us_id','us_ic','us_name','us_last_name','us_phone'];
   }
