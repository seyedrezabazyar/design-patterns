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

class ShippingDecorator implements Cost
{
    private $cost;
    public function __construct(Cost $cost)
    {
        $this->cost = $cost;
    }
    public function getCost()
    {
        return 15000;
    }

    public function getDescription()
    {
        return 'Shipping Cost';
    }

    public function getTotalCost()
    {
        return $this->cost->getTotalCost() + self::getCost();
    }

    public function getDetails()
    {
        return $this->cost->getDetails() +  [
                self::getDescription() => self::getCost()
            ];
    }
}

class TaxDecorator implements Cost
{
    private $cost;
    public function __construct(Cost $cost)
    {
        $this->cost = $cost;
    }
    public function getCost()
    {
        return $this->cost->getTotalCost() * 0.09;
    }

    public function getDescription()
    {
        return 'Tax Cost';
    }

    public function getTotalCost()
    {
        return $this->cost->getTotalCost() + self::getCost();
    }

    public function getDetails()
    {
        return $this->cost->getDetails() +  [
                self::getDescription() => self::getCost()
            ];
    }
}

class PackageDecorator implements Cost
{
    private $cost;
    public function __construct(Cost $cost)
    {
        $this->cost = $cost;
    }
    public function getCost()
    {
        return 5000;
    }

    public function getDescription()
    {
        return 'Package Cost';
    }

    public function getTotalCost()
    {
        return $this->cost->getTotalCost() + self::getCost();
    }

    public function getDetails()
    {
        return $this->cost->getDetails() +  [
                self::getDescription() => self::getCost()
            ];
    }
}

$basketCost = new BasketCost();
$shippingAndBasketCost = new ShippingDecorator(new BasketCost());
$basketWithTax = new TaxDecorator(new BasketCost());
$basketWithTaxAndShipping = new ShippingDecorator($basketWithTax);
$basketWithShippingAndPackage = new ShippingDecorator(new PackageDecorator(new BasketCost()));

var_dump($basketWithShippingAndPackage->getDetails());
var_dump($basketWithShippingAndPackage->getTotalCost());