<?php
class Kavenegar
{
    public function sendSms()
    {
        echo 'Send SMS' . PHP_EOL;
    }
}
class User
{
    private $kavenegar;
    public function __construct(Kavenegar $kavenegar)
    {
        $this->kavenegar = $kavenegar;
    }
    public function create()
    {
        echo 'User Created' . PHP_EOL;
        $this->kavenegar->sendSms();
    }
}
class Order
{
    private $kavenegar;
    public function __construct(Kavenegar $kavenegar)
    {
        $this->kavenegar = $kavenegar;
    }
    public function create()
    {
        echo 'Order Created' . PHP_EOL;
        $this->kavenegar->sendSms();
    }
}

$kavenegar = new Kavenegar;
$user = new User($kavenegar);
$user->create();
$order = new Order($kavenegar);
$order->create();