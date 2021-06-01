<?php

namespace App\Modules\Listas\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Modules\Listas\Models\Product;
use App\Modules\Listas\Models\Category;

class ProductController extends Controller
{
    public function create($lista_id) {
        $product = new Product();
        $categories = Category::active()->get();

        $form_data_product = [
            'id'        => 'form_product',
            'method'    => 'POST',
            'route'     => ['product.store'],
        ];

        return view('Listas::partials.partial_addproduct', compact('form_data_product', 'lista_id', 'product', 'categories'));
    }

    public function edit($product_id) {
        $product = Product::find($product_id);

        if (is_null($product))
            app()->abort(404);

        $categories = Category::active()->get();

        $lista_id = $product->productlist_id;

        $form_data_product = [
            'id'        => 'form_product',
            'method'    => 'POST',
            'route'     => ['product.update', $product_id],
        ];

        return view('Listas::partials.partial_addproduct', compact('form_data_product', 'lista_id', 'product', 'categories'));
    }

    public function store(Request $request) {
        $product = new Product();
        $response = $this->save($request, $product);

        if ($response)
            return redirect()->route('listas.edit', ['id' => $request->productlist_id]);
    }

    public function update(Request $request, $product_id) {
        $product = Product::find($product_id);

        if (is_null($product))
            app()->abort(404);

        $response = $this->save($request, $product);

        if ($response)
            return redirect()->route('listas.edit', ['id' => $request->productlist_id]);
    }

    public function delete($product_id) {
        $product = Product::find($product_id);

        $lista_id = $product->productlist_id;

        if (\is_null($product_id))
            app()->abort(404);

        $product->delete();

        return redirect()->route('listas.edit', ['id' => $lista_id]);
    }

    private function save(Request $request, Product $product) {
        try {
            DB::beginTransaction();

            $product->name              = $request->name;
            $product->productlist_id    = $request->productlist_id;
            $product->quantity          = $request->quantity;
            $product->category_id       = $request->category_id;
            $product->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return false;
        }

        return true;
    }
}
