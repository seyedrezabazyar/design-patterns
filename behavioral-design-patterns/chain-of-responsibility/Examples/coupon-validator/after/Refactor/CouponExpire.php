<?php

require_once 'AbstractCouponValidator.php';

class CouponExpire extends AbstractCouponValidator
{
    public function validate($code)
    {
        if ($this->coupon->isExpired($code)) {
            throw new Exception('Code is expired');
        }

        echo "Coupon is not expired" . PHP_EOL;

        return $this->goToNextValidator($code);
    }
}
