<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pay_model extends Model
{
    use HasFactory;
    protected $table = "pay_model";
    protected $primaryKey = "id";
    public $timestamps = false;
}
