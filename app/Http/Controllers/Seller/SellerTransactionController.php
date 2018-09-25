<?php

namespace App\Http\Controllers\Seller;

use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class SellerTransactionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $transactions= $seller->products()
                ->whereHas('transaction')
                ->with('transaction')
                ->get()
                ->pluck('transaction')
                ->collapse();

        return $this->showAll($transactions);
    }

    
}
