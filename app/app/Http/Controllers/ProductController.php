<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    public function __construct(ProductRepository $repo)
    {
        parent:: __construct($repo);
    }
}
