<?php
namespace App\Common;

class Cart {
    public $items = [];
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct() {
        $this->items = session('cart') ? session('cart') : [];
        $this->totalQuantity = $this->totalQuantity();
        $this->totalPrice = $this->getTotalPrice();
    }

    public function add($product, $quantity) {
        if (isset($this->items[$product->id])) {
            $this->items[$product->id]->quantity +=1;
        } else {
            $item = (object)[
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->sale_price ? $product->sale_price : $product->price,
                'image' => $product->image,
                'quantity' => $quantity
            ];
            $this->items[$product->id] = $item;
        }
        
        session(['cart' => $this->items]); // Lưu vào sesion $_SESSION['cart'] = $carts
    }

    public function remove($product) {
        if (isset($this->items[$product->id])) {
            unset($this->items[$product->id]);
            session(['cart' => $this->items]); // Lưu vào sesion $_SESSION['cart'] = $carts
        }
        
    }

    public function update($product, $quantity) {
        if (isset($this->items[$product->id])) {
            $this->items[$product->id]->quantity = $quantity;
            session(['cart' => $this->items]); // Lưu vào sesion $_SESSION['cart'] = $carts
        }
    }

    public function clear() {
        session(['cart' => null]);
    }

    private function totalQuantity() {
        $total = 0;

        foreach($this->items as $item) {
            $total += $item->quantity;
        }

        return $total;
    }

    private function getTotalPrice() {
        $total = 0;

        foreach($this->items as $item) {
            $total += $item->quantity * $item->price;
        }

        return $total;
    }
}