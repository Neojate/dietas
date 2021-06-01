<?php

namespace App\Modules\Listas\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Modules\Listas\Models\ProductList;

class ListaController extends Controller
{
    public function index() {
        $productList = ProductList::where('user_id', auth()->user()->id)->get();

        return view('Listas::front_index', compact('productList'));
    }

    public function create() {
        $productList = new ProductList();

        $form_data = [
            'id'        => 'form',
            'method'    => 'POST',
            'route'     => ['listas.store'],
        ];

        return view('Listas::front_edit', compact('form_data', 'productList'));
    }

    public function edit($id) {
        $productList = ProductList::find($id);

        if (is_null($productList))
            app()->abort(403);

        /* usort($productList->products, function($a, $b) {
            return strcmp($a->category->name, $b->category->name);
        }); */

        $form_data = [
            'route'     => ['listas.update', $id],
            'method'    => 'POST',
            'id'        => 'form',
        ];

        return view('Listas::front_edit', compact('form_data', 'productList'));
    }

    public function store(Request $request) {
        $productList = new ProductList();

        $response = $this->save($request, $productList);

        if (!is_null($response))
            return redirect()->route('listas.edit', ['id' => $response->id]);
    }

    public function update(Request $request, $id) {
        $productList = ProductList::find($id);

        if (is_null($productList))
            app()->abort(404);

        $response = $this->save($request, $productList);

        if (!is_null($response))
            return redirect()->route('listas.edit', ['id' => $response->id]);
    }

    public function delete($id) {
        $list = ProductList::find($id);

        if (\is_null($list))
            app()->abort(404);

        $list->delete();

        return redirect()->route('listas.index');
    }

    private function save(Request $request, ProductList $productList) {
        try {
            DB::beginTransaction();

            $productList->user_id       = auth()->user()->id;
            $productList->name          = $request->name;
            $productList->market        = $request->market;
            $productList->description   = $request->description;
            $productList->save();

            DB::commit();
            return $productList;
        } catch (Exception $e) {
            DB::rollback();
            return null;
        }
    }

}
