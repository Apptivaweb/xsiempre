<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generado_tag extends Model
{
    use HasFactory;
    public $timestamps = false;
	protected $fillable =['generado_id','tag_id'];
}
