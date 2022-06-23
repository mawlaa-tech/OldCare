<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Old extends Model
{
    use HasFactory;
   
    protected $fillable=['nom','prenom','age','adresse','proche_number','room_number'];
}
