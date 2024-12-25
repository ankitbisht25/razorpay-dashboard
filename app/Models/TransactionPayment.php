<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionPayment extends Model
{
    use HasFactory;
    protected $table = 'transaction_payments';
    protected $fillable = ['payment_id', 'bank_rrn', 'customer_detail', 'amount', 'created_on', 'status', 'duration'];
}
