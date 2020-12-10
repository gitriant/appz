<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_kerusakan extends Model
{
    use HasFactory;
    protected $table = "kerusakan";
    protected $primaryKey = 'id_kerusakan';
}
