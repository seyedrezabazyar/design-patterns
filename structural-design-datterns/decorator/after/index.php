<?php

interface Cost
{
    public function getCost();
    public function getTotalCost();
    public function getDescription();
    public function getDetails();
}

class BasketCost implements Cost
{
    public function getCost()
    {
        return 150000;
    }

    public function getDescription()
    {
        return 'Basket Cost';
    }

    public function getTotalCost()
    {
        return self:: getCost();
    }

    public function getDetails()
    {
        return [
            self::getDescription() => self::getCost()
        ];
    }
}

abstract class AbstractDecorator implements Cost
{
    protected $cost;
    public function __construct(Cost $cost)
    {
        $this->cost = $cost;
    }

    public function getTotalCost()
    {
        return $this->cost->getTotalCost() + static::getCost();
    }

    public function getDetails()
    {
        return $this->cost->getDetails() +  [
                static::getDescription() => static::getCost()
            ];
    }
}

class ShippingDecorator extends AbstractDecorator
{
    public function getCost()
    {
        return 15000;
    }

    public function getDescription()
    {
        return 'Shipping Cost';
    }
}

class TaxDecorator extends AbstractDecorator
{
    public function getCost()
    {
        return $this->cost->getTotalCost() * 0.09;
    }

    public function getDescription()
    {
        return 'Tax Cost';
    }
}

class PackageDecorator extends AbstractDecorator
{
    public function getCost()
    {
        return 5000;
    }

    public function getDescription()
    {
        return 'Package Cost';
    }
}

$basketCost = new BasketCost();
$shippingAndBasketCost = new ShippingDecorator(new BasketCost());
$basketWithTax = new TaxDecorator(new BasketCost());
$basketWithTaxAndShipping = new ShippingDecorator($basketWithTax);
$basketWithShippingAndPackage = new ShippingDecorator(new PackageDecorator(new BasketCost()));

var_dump($basketWithShippingAndPackage->getDetails());
var_dump($basketWithShippingAndPackage->getTotalCost());