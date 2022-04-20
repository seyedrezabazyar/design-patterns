<?php

abstract class AbstractCouponValidator
{
    protected Coupon $coupon;
    protected $nextValidator;

    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    public function setNextValidator(AbstractCouponValidator $validator)
    {
        $this->nextValidator = $validator;
    }

    protected function goToNextValidator($code)
    {
        if ($this->nextValidator === null) {
            return true;
        } else {
            return $this->nextValidator->validate($code);
        }
    }

    abstract public function validate($code);
}
