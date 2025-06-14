<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionPayment extends Model
{
    use HasFactory;
    protected $table = 'transaction_payments';
    protected $fillable = ['client_id', 'payment_id', 'bank_rrn', 'customer_detail', 'customer_email', 'amount', 'created_on', 'status', 'duration'];
}
