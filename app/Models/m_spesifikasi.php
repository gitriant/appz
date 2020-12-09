<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_spesifikasi extends Model
{
    use HasFactory;
    protected $table = "spesifikasi";
    protected $primaryKey = 'id_spesifikasi';
}
