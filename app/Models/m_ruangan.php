<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_ruangan extends Model
{
    use HasFactory;
    protected $table = "ruangan";
    protected $primaryKey = 'id_ruangan';
}
