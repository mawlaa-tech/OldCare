<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proche extends Model
{
    use HasFactory;
    protected $fillable=['nom','prenom','adresse','email','proche_number'];

}
