<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_komputer extends Model
{
    use HasFactory;
    protected $table = "komputer";
    protected $primaryKey = 'id_komp';
}
