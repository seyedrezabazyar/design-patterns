<?php

class Payment
{
    public function Pay(int $amount, string $type)
    {
        if ($type == 'online'){
            echo "Pay $amount Online";
        }
        if ($type == 'cashOn'){
            echo "Pay $amount CashOn";
        }
        if ($type == 'cartToCart'){
            echo "Pay $amount CartToCart";
        }
    }
}

$payment = new Payment;
$payment->Pay(15000, 'cartToCart');