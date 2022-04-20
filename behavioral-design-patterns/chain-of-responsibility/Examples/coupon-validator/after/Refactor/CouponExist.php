<?php

class CouponExist
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
        if (empty($this->coupon->find($code))) {
            throw new Exception('Code not exists');
        }

        echo "Coupon exists" . PHP_EOL;

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
