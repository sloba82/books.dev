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

    /**
     * Method for creating new order in db.
     *
     * @param array $params
     * @param int $userId
     * @return bool
     */
    public function createNewOrder($params, $userId)
    {
        $order = new OrderModel();

        $order->user_id = $userId;
        $order->books = serialize($params['books']);
        $order->status = $params['status'] ? $params['status'] : 1;

        return $order->save();
    }
}