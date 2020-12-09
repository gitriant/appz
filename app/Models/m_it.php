<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_it extends Model
{
    use HasFactory;
    protected $table = "it";
    protected $primaryKey = 'id_it';
}
