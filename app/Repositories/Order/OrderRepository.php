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

    /**
     * Method for getting order by id from db.
     *
     * If order model is found, method returns order model with relational user model.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getOrderById($id)
    {
        $order = OrderModel::find($id);

        if ($order)
        {
            $order->user;
        }

        return $order;
    }

    /**
     * Method for updating order in db.
     *
     * @param array $params
     * @param int $id
     * @return bool
     */
    public function updateOrder($params, $id)
    {
        $order = OrderModel::find($id);

        $order->user_id = $params['user_id'];
        $order->books = serialize($params['books']);
        $order->status = $params['status'] ? $params['status'] : 1;

        return $order->save();
    }
}