<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionOverview extends Model
{
    use HasFactory;
    protected $table = 'transaction_overviews';
    protected $fillable = ['collected_amount', 'captured_payment', 'refunds', 'processed', 'disputes', 'open', 'under_review', 'failed_payments', 'orders', 'graph_data', 'duration'];
}
