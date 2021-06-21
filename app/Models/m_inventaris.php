<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_inventaris extends Model
{
    use HasFactory;
    protected $table = "jenis_inventaris";
    protected $primaryKey = 'id_jenis_barang';
}
