<?php

class CouponActive
{
    private Coupon $coupon;
    private $nextValidator;

    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    public function setNextValidator($validator)
    {
        $this->nextValidator = $validator;
    }

    public function validate($code)
    {
        if (!$this->coupon->isActive($code)) {
            throw new Exception('Code not acrive');
        }

        echo "Coupon is active" . PHP_EOL;

        return $this->goToNextValidator($code);
    }

    private function goToNextValidator($code)
    {
        if ($this->nextValidator === null) {
            return true;
        } else {
            return $this->nextValidator->validate($code);
        }
    }
}
