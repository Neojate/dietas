<?php

namespace App\Modules\Compras\Controllers;

use Illuminate\Http\Request;
use App\Modules\Compras\Models\Buy;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Modules\Listas\Models\ProductList;

class ComprarController extends Controller
{
    public function index() {
        $productList = ProductList::where('user_id', auth()->user()->id)->get();

        return view('Compras::front_index', compact('productList'));
    }

    public function create($id) {
        $productList = ProductList::find($id);

        if (is_null($productList))
            app()->abort(404);

        $buy = new Buy();

        $form_data = [
            'id'        => 'form',
            'method'    => 'POST',
            'route'     => ['compras.store'],
        ];

        return view('Compras::front_edit', compact('buy', 'form_data', 'productList'));
    }

    public function store(Request $request) {
        $buy = new Buy();
        $response = $this->save($request, $buy);

        if ($response)
            return redirect()->route('compras.index');
    }

    private function save(Request $request, Buy $buy) {
        try {
            /* DB::beginTransaction();

            $buy->productList_id = $request->productListId;
            $buy->user_id = auth()->user()->id;
            $buy->cost = $request->cost;
            $buy->save();

            DB::commit(); */
            return true;
        } catch (Exception $e) {
            DB::rollback();
            return false;
        }
    }

}
