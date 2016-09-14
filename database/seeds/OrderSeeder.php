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
                'books' => serialize([1,2]),
                'status' => 1,
            ],
            [
                'user_id' => 2,
                'books' => serialize([1,2,3]),
                'status' => 2
            ],
            [
                'user_id' => 3,
                'books' => serialize([1,2,4]),
                'status' => 3
            ],
        ];

        foreach ($books as $book) {
            OrderModel::create($book);
        }
    }
}