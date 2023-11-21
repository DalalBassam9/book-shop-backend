<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;
	protected $primaryKey = 'orderItemsId';

    protected $fillable = [
		'productId',
        'orderId'

	];

	public function order(): BelongsTo
	{
		return $this->belongsTo(Order::class, 'orderId');
	}

	public function product(): BelongsTo
	{
		return $this->belongsTo(Product::class, 'productId');
	}

}
