<?php
interface PaymentStrategyInterface
{
    public function Pay(int $amount);
}
class OnlinePaymentStrategy implements PaymentStrategyInterface
{
    public function Pay(int $amount){
        echo "Pay $amount Online";
    }
}
class CashOnPaymentStrategy implements PaymentStrategyInterface
{
    public function Pay(int $amount){
        echo "Pay $amount CashOn";
    }
}
class CartToCartPaymentStrategy implements PaymentStrategyInterface
{
    public function Pay(int $amount){
        echo "Pay $amount CartToCart";
    }
}
class Payment
{
    private $strategy;
    public function __construct(PaymentStrategyInterface $paymentStrategy)
    {
        $this->setStrategy($paymentStrategy);
    }

    public function setStrategy(PaymentStrategyInterface $paymentStrategy)
    {
        $this->strategy = $paymentStrategy;
    }

    public function Pay(int $amount)
    {
        // some logic
        return $this->strategy->Pay($amount);
    }
}

$payment = new Payment(new OnlinePaymentStrategy);
$payment->Pay(15000);
$payment->setStrategy(new CartToCartPaymentStrategy());
$payment->Pay(20000);