<?php

require_once 'AbstractCouponValidator.php';

class CouponExist extends AbstractCouponValidator
{
    public function validate($code)
    {
        if (empty($this->coupon->find($code))) {
            throw new Exception('Code not exists');
        }

        echo "Coupon exists" . PHP_EOL;

        return $this->goToNextValidator($code);
    }
}
