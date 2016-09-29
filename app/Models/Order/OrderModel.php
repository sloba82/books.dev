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

    /**
     * Rules to be passed while creating new order.
     *
     * @var array
     */
    public static $rulesCreate = [
        'books' => 'required|min:1|max:126',
        'status' => 'required',
    ];

    /**
     * Rules to be passed while update new order.
     *
     * @var array
     */
    public static $rulesUpdate = [
        'user_id' => 'required|exists:users,id',
        'books' => 'required|min:1|max:126',
        'status' => 'required|max:10',
    ];

    /**
     * Relation: one order model belongs to one user model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User\UserModel');
    }
}
