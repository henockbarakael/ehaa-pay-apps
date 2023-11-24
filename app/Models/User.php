<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'user_id');
    }

    public function customerAuth()
    {
        return $this->hasOne(CustomerAuth::class, 'customer_id');
    }

    public function getCustomerAuthCredentials()
    {
        $customer = $this->customer;

        if ($customer) {
            $customerAuth = $customer->customerAuth()->first();

            if ($customerAuth) {
                return [
                    'client_id' => $customerAuth->client_id,
                    'client_secret' => $customerAuth->password_salt,
                ];
            }
        }

        return null;
    }

    public static function getAccountCode($userId)
    {
        $user = User::findOrFail($userId);
        
        $accountCode = $user->customer->accounts->where('currency', 'CDF')->first()->account_code;
        
        return $accountCode;
    }

    public function transactions()
    {
        return $this->hasManyThrough(Transaction::class, Account::class, 'customer_id', 'account_code', 'id', 'account_code')
        ->join('customers', 'accounts.customer_id', '=', 'customers.id')
        ->join('users', 'customers.user_id', '=', 'users.id');
    }

    public function getAllTransactions($perPage = 10)
    {
        return $this->transactions()->paginate($perPage);
    }



    public function accounts(): HasManyThrough
    {
        return $this->hasManyThrough(Account::class, Customer::class, 'user_id', 'customer_id','id');
    }

    public function getBalancesByCurrency()
    {
        $balances = $this->accounts()
        ->select('currency', DB::raw('SUM(balance) as total_balance'), 'customers.user_id')
        ->groupBy('currency', 'customers.user_id')
        ->get()
        ->pluck('total_balance', 'currency');

        return $balances;
    }
}
