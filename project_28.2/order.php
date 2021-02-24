<?php
interface iOrder
{
}

class Order implements iOrder
{
    private $customer;
    private $products = array();
    private $deliveryTime;
    private $dicountType;

    public function __construct(Customer $Customer, array $Products)
    {
        $this->customer = $Customer;
        $this->products = $Products;
        $this->deliveryTime = rand(0, 1);
        $this->dicountType = rand(0, 1);
    }

    public function getDeliveryTime()
    {
        return $this->deliveryTime;
    }

    public function getInfo()
    {
        $returnArray = array($customer, $products);
        return $this->$returnArray;
    }
}

class OrderFactory
{
    public static function Create(Customer $Customer, array $Products)
    {
        return new Order($Customer, $Products);
    }
}
