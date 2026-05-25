<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'donor_name',
        'donor_email',
        'amount',
        'currency',
        'payment_method_id',
        'transaction_reference',
        'message',
        'status',
        'project_id',
        'frequency',
    ];

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function project()
    {
        return $this->belongsTo(Projects::class);
    }
}
