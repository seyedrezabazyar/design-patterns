<?php

require './Coupon.php';
require './CouponValidator.php';

$code = '7learn';
$coupon = new Coupon;
$validator = new CouponValidator($coupon);

$validator->validate($code);
