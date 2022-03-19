<?php


class CartTest extends \PHPUnit\Framework\TestCase
{
    public function test_item_is_added_to_cart()
    {
        $total = new App\Cart;
        $total->setPrice(20.00);

        $total->add_item_to_cart(15.00);
        $totalNoTax = $total->get_price_without_tax();

        $this->assertEquals(35.00, $totalNoTax);

    }

    public function test_item_is_removed_from_cart()
    {
        $total = new App\Cart;
        $total->setPrice(20.00);

        $total->remove_item_from_cart(15.00);
        $totalNoTax = $total->get_price_without_tax();

        $this->assertEquals(5.00, $totalNoTax);

    }

    public function test_price_display_with_tax()
    {
        $total = new App\Cart;
        $total->setPrice(20.00);

        $total->remove_item_from_cart(15.00);
        $totalTax = $total->get_price_with_tax();

        $this->assertEquals(5.75, $totalTax);

        $total2 = new App\Cart;
        $total2->setPrice(20.00);

        $total2->add_item_to_cart(15.00);
        $totalTax = $total2->get_price_with_tax();

        $this->assertEquals(40.25, $totalTax);

    }
}