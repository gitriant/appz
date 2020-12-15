<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_ticket extends Model
{
    use HasFactory;
    protected $table = "ticket";
    protected $primaryKey = 'id_ticket';
}
