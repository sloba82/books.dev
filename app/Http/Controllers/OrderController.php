<?php

namespace App\Http\Controllers;

use App\Models\Order\OrderModel;
use App\Repositories\Order\OrderRepository;
use App\UtilityHelpers\UtilityHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{

    /**
     * @var OrderRepository
     */
    protected $orderHandler;


    /**
     * OrderController constructor.
     *
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderHandler = new $orderRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!UtilityHelpers::getUserFromJWT())
        {
            return response()->json([ 'message' => trans('response.user') ], 400);
        }

        $orders = $this->orderHandler->getAllOrders();
        if (empty($orders))
        {
            return response()->json(['message' => trans('response.nodata')], 404);
        }

        return response()->json($orders, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = UtilityHelpers::getUserFromJWT();
        if (!$user)
        {
            return response()->json([ 'message' => trans('response.user') ], 400);
        }

        $params = $request->all();

        $valid = Validator::make($params, OrderModel::$rules);
        if ($valid->fails()) {
            return response()->json(array('message' => trans('response.invalid')), 400);
        }

        if (!$this->orderHandler->createNewOrder($params, $user->id))
        {
            return response()->json([ 'message' => trans('response.not_created') ], 500);
        }

        return response()->json([ 'message' => trans('response.created') ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!UtilityHelpers::getUserFromJWT())
        {
            return response()->json([ 'message' => trans('response.user') ], 400);
        }

        $user = $this->orderHandler->getOrderById($id);
        if (!$user)
        {
            return response()->json([ 'message' => trans('response.not_found') ], 404);
        }

        return response()->json($user, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
