<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettlementOverview extends Model
{
    use HasFactory;
    protected $table = 'settlement_overviews';
    protected $fillable = ['current_balance', 'settlement_due_today', 'previous_settlement', 'upcoming_settlement'];
}
