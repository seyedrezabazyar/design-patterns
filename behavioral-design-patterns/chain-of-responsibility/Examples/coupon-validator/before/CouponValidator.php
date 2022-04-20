<?php

class CouponValidator
{
    private $coupon;

    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    public function validate(string $code)
    {
        if (empty($this->coupon->find($code))) {
            throw new Exception('Code not exists');
        }

        echo "Coupon exists" . PHP_EOL;

        if (!$this->coupon->isActive($code)) {
            throw new Exception('Code not acrive');
        }

        echo "Coupon is active" . PHP_EOL;

        if ($this->coupon->isExpired($code)) {
            throw new Exception('Code is expired');
        }

        echo "Coupon is not expired" . PHP_EOL;
    }
}
