<?php

namespace Modules\Discount\Entities;

use App\Models\HasManySyncable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
		'name',
		'code',
		'expired_at',
		'usable_number',
		'max_discount',
		'max_usage',
		'discount',
		'discount_percent',
		'minimum_order_cost',
		'expired',
	];

	protected $guarded = [
		'expired',
	];

	protected $hidden = [
		'expired_at',
		'updated_at',
		'deleted_at',
		'expire'
	];


	public function categoryAndProducts(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(DiscountsHasCategoryAndProduct::class);
	}



	public function setExpiredAtAttribute($item): Carbon
	{
		return Carbon::createFromDate($item);
	}




	public function hasMany($related, $foreignKey = null, $localKey = null)
	{
		$instance = $this->newRelatedInstance($related);
		$foreignKey = $foreignKey ?: $this->getForeignKey();
		$localKey = $localKey ?: $this->getKeyName();
		return new HasManySyncable(
			$instance->newQuery(), $this, $instance->getTable().'.'.$foreignKey, $localKey
		);
	}







}
