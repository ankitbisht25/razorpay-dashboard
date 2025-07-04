<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;
    protected $table = 'dashboards';
    protected $fillable = ['client_id', 'user_name', 'current_balance', 'last_settlement', 'status', 'deposit_date'];
}
