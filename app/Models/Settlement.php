<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    use HasFactory;
    protected $table = 'settlements';
    protected $fillable = ['settlement_id', 'utr_no', 'created_on', 'net_Settlement', 'status', 'duration'];
}
