<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function customerAuth()
    {
        return $this->hasOne(CustomerAuth::class, 'customer_id');
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
