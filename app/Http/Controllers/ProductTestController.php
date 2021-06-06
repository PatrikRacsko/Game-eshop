<?php

namespace App\Http\Controllers;

use App\ProductTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductTestController extends Controller
{
    public function list($page) {  
        // get rowsPerPage from query parameters (after ?), if not set => 5
        $rowsPerPage = request('rowsPerPage', 5);
            
        // get sortBy from query parameters (after ?), if not set => name
        $sortBy = request('sortBy', 'name');
            
        // get descending from query parameters (after ?), if not set => false 
        $descendingBool = request('descending', 'false');
        // convert descending true|false -> desc|asc
        $descending = $descendingBool === 'true' ? 'desc' : 'asc';
        
        // pagination
        // IFF rowsPerPage == 0, load ALL rows
        if ($rowsPerPage == 0) {
            // load all products from DB
            $products = DB::table('products')
                ->orderBy($sortBy, $descending)
                ->get();
        } else {
            $offset = ($page - 1) * $rowsPerPage;
              
            // load products from DB
            $products = DB::table('products')
                ->orderBy($sortBy, $descending)
                ->offset($offset)
                ->limit($rowsPerPage)
                ->get();
        }
      
        // total number of rows -> for quasar data table pagination
        $rowsNumber = DB::table('products')->count();
            
        return response()->json(['rows' => $products, 'rowsNumber' => $rowsNumber]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductTest  $productTest
     * @return \Illuminate\Http\Response
     */
    public function show(ProductTest $productTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductTest  $productTest
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTest $productTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductTest  $productTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductTest $productTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductTest  $productTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductTest $productTest)
    {
        //
    }
}
