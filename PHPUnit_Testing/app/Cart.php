<?php
namespace App;
class Cart
{
    private float $price;
    private float $tax=1.15;

    public function setPrice($price=0)
    {
        $this->price = $price;
    }

    public function get_price_without_tax()
    {
        return $this->price;
    }

    public function add_item_to_cart($newItemPrice)
    {
        $this->price = ($this->price) + $newItemPrice;
        return $this->price;
    }

    public function remove_item_from_cart($removePrice)
    {
        $this->price = ($this->price) - $removePrice;
        return $this->price;
    }

    public function get_price_with_tax()
    {
        $this->price = ($this->price) * $this->tax;
        return $this->price;
    }
}
