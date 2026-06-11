<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = collect($this->demoProducts());

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0|max:9999999.99',
            'stock' => 'required|integer|min:0|max:999999',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        return redirect('/products')->with('success', 'Demo mode: product form validated without database storage.');
    }

    public function show(string $product)
    {
        return redirect('/products');
    }

    public function edit(string $product)
    {
        $product = $this->findDemoProduct($product);

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, string $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0|max:9999999.99',
            'stock' => 'required|integer|min:0|max:999999',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        return redirect('/products')->with('success', 'Demo mode: product update validated without database storage.');
    }

    public function destroy(string $product)
    {
        return redirect('/products')->with('success', 'Demo mode: product delete skipped because database storage is disabled.');
    }

    private function findDemoProduct(string $id): object
    {
        foreach ($this->demoProducts() as $product) {
            if ((string) $product->id === $id) {
                return $product;
            }
        }

        abort(404);
    }

    /**
     * Database-free product data for automated monolithic deploy demos.
     */
    private function demoProducts(): array
    {
        return [
            (object) [
                'id' => 1,
                'name' => 'Wireless Keyboard',
                'description' => 'Compact mechanical keyboard for fast product demos.',
                'price' => 59.90,
                'stock' => 24,
                'image' => null,
            ],
            (object) [
                'id' => 2,
                'name' => 'USB-C Hub',
                'description' => 'Seven-port hub with HDMI, card reader, and power delivery.',
                'price' => 42.50,
                'stock' => 8,
                'image' => null,
            ],
            (object) [
                'id' => 3,
                'name' => 'Portable Monitor',
                'description' => 'Lightweight second screen for remote work setups.',
                'price' => 189.00,
                'stock' => 13,
                'image' => null,
            ],
        ];
    }
}
