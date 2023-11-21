<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Order extends Model
{
    use HasFactory;
	
	protected $primaryKey = 'orderId';

	protected $fillable = [
		'status',
		'total',
		'addressId',
		'userId'

	];

	

	public function orderItems(): HasMany
	{
		return $this->hasMany(OrderItem::class, 'orderId');
	}



	public function address(): HasOne
	{
		return $this->hasOne(Address::class, 'addressId');
	}


	public function user(): HasOne
	{
		return $this->hasOne(User::class, 'userId');
	}

}
