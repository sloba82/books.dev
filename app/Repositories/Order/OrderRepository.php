<?php

namespace App\Repositories\Order;

use App\Models\Order\OrderModel;

/**
 * Class OrderRepository
 * @package App\Repositories\Order
 */
class OrderRepository
{
    /**
     * Method for getting all orders from db.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllOrders()
    {
        return OrderModel::all();
    }
}