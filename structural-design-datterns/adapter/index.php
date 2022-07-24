<?php
class Kavenegar
{
    public function sms()
    {
        echo 'Send SMS' . PHP_EOL;
    }
}
class KavenegarAdapter
{
    private $kavenegar;
    public function __construct(Kavenegar $kavenegar)
    {
        $this->kavenegar = $kavenegar;
    }

    public function sendSms()
    {
        return $this->kavenegar->sms();
    }
}
class User
{
    private $kavenegarAdapter;
    public function __construct(KavenegarAdapter $kavenegarAdapter)
    {
        $this->KavenegarAdapter = $kavenegarAdapter;
    }
    public function create()
    {
        echo 'User Created' . PHP_EOL;
        $this->KavenegarAdapter->sendSms();
    }
}
class Order
{
    private $kavenegarAdapter;
    public function __construct(KavenegarAdapter $kavenegarAdapter)
    {
        $this->KavenegarAdapter = $kavenegarAdapter;
    }
    public function create()
    {
        echo 'Order Created' . PHP_EOL;
        $this->KavenegarAdapter->sendSms();
    }
}

$kavenegar = new Kavenegar;
$KavenegarAdapter = new KavenegarAdapter($kavenegar);
$user = new User($KavenegarAdapter);
$user->create();
$order = new Order($KavenegarAdapter);
$order->create();