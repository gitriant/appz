<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_resolution extends Model
{
    use HasFactory;
    protected $table = "resolution";
    protected $primaryKey = 'id_resolution';
}
