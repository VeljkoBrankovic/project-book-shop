<?php

namespace lib\ShoppingCart;

use models\Book_model\Book_model;
use lib\ShoppingCartItem\ShoppingCartItem;

class ShoppingCart
{

    protected $items = [];

    public function __construct($cartFromSession)
    {
        foreach ($cartFromSession as $item) {
            $this->items[] = new ShoppingCartItem(Book_model::getOneBookById($item['id']), $item['quantity']);
        }
    }


    public function addToCart($product, $quantity = 1)
    {
        $flag = false;
        foreach ($this->items as $item) {
            if ($item->getProduct()->id == $product->id) {
                $item->setQuantity($item->getQuantity() + $quantity);
                $flag = true;
            }
        }
        if (!$flag) {
            $this->items[] = new ShoppingCartItem($product, $quantity);
        }
        return $this;
    }

    public function addToCart2($product, $quantity = 1)
    {
        $flag = false;
        foreach ($this->items as $item) {
            if ($item->getProduct()->id == $product->id) {
                $item->setQuantity($quantity);
                $flag = true;
            }
        }
        if (!$flag) {
            $this->items[] = new ShoppingCartItem($product, $quantity);
        }
        return $this;
    }

    public function removeProduct(Book_model $product)
    {
        if ($product instanceof Book_model) {
            foreach ($this->getItems() as $key => $item) {
                if ($item->getProduct()->id == $product->id) {
                    unset($this->items[$key]);
                }
            }
        }
        return $this;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getOneItem($productId)
    {
        foreach ($this->items as $item) {
            if ($item->getProduct()->id == $productId) {
                return $item;                
            }
        }
        return false;
    }

    public function checkout()
    {
        //
    }

    public function updateSession()
    {
        $_SESSION['cart'] = [];
        foreach ($this->items as $item) {
            $_SESSION['cart'][] = [
                'id' => $item->getProduct()->id,
                'quantity' => $item->getQuantity()
            ];
        }
    }
}
