<?php

class Coupon
{
    public function find(string $code)
    {
        return true;
    }

    public function isActive(string $code)
    {
        return true;
    }

    public function isExpired(string $code)
    {
        return false;
    }
}
