<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_feedback extends Model
{
    use HasFactory;
    protected $table = "feedback";
    protected $primaryKey = 'id_feedback';
}
