<?php

require './Refactor/CouponExist.php';
require './Refactor/CouponActive.php';
require './Refactor/CouponExpire.php';

class CouponValidator
{
    private $coupon;

    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    public function validate(string $code)
    {
        $couponExist = new CouponExist($this->coupon);
        $couponActive = new CouponActive($this->coupon);
        $couponExpire = new CouponExpire($this->coupon);

        $couponExist->setNextValidator($couponActive);
        $couponActive->setNextValidator($couponExpire);

        $couponExist->validate($code);
    }
}
