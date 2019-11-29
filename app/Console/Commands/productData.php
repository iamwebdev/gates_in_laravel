<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Product;

class productData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add products in database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $objProduct = new Product;
        $objProduct->name= 'Beer';
        $objProduct->description= 'Strong';
        $objProduct->quantity= '100';
        $objProduct->save(); 
        echo "Products data added successfully";
    }
}
