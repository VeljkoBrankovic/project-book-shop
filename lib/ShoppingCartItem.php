<?php

namespace lib\ShoppingCartItem;

use models\Book_model\Book_model;

class ShoppingCartItem {

    protected $product;
    protected $quantity;

    public function __construct($product, $quantity)
    {
        $this->setProduct($product);
        $this->setQuantity($quantity);
    }

    public function getProduct() {
        return $this->product;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getSubtotal() {
        return $this->getProduct()->price * $this->getQuantity();
    }

    public function setProduct(Book_model $product) {
       if (!($product instanceof Book_model)) {
           return false;
       }
        $this->product = $product;
        return $this;
    }

    public function setQuantity($quantity) {
        if (!is_numeric($quantity) || $quantity < 0) {
            return false;
        }
        $this->quantity = $quantity;
        return $this;
    }

}


