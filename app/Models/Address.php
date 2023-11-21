<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

	protected $fillable = [
		'cityId',
		'district',
		'phone',
        'firstName',
        'lastName',
		'address',
		'default',
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'userId');
	}


	public function city()
	{
		return $this->belongsTo(City::class, 'cityId');
	}

}
