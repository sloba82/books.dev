<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;


/**
 * Class OrderModel
 * @package App\Models\Order
 */
class OrderModel extends Model
{

    /**
     * @var string $table
     */
    protected $table = "orders";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'books',
        'status',
    ];
}
