<?php

use Illuminate\Database\Seeder;
use App\Models\Order\OrderModel;

/**
 * Class OrderSeeder
 */
class OrderSeeder extends Seeder
{

    /**
     * define values that will be filled in into table 'orders'
     * @return void
     */
    public function run()
    {
        $books = [
            [
                'user_id' => 1,
                'books' => serialize([1,2,3,4]),
                'status' => 'Processing',
            ],
            [
                'user_id' => 2,
                'books' => serialize([1,2,3]),
                'status' => 'Production'
            ],
            [
                'user_id' => 3,
                'books' => serialize([1,2,4]),
                'status' => 'Sent'
            ],
        ];

        foreach ($books as $book) {
            OrderModel::create($book);
        }
    }
}