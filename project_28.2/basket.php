<?php
interface iBasket
{
    function addProduct(Product $Product, int $Quantity);
    function removeProduct(Product $Product);
    function changeProductQuantity(Product $Product, int $Quantity);
    function getProductList();
}

class Basket implements iBasket
{
    private $customer;
    private $products = array();

    public function __construct(Customer $Customer)
    {
        $this->customer = $Customer;
    }

    public function setDefault()
    {
        unset($this->products);
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function addProduct(Product $Product, int $Quantity)
    {
        if ($Product->getQuantity() > 0 && $Product->getQuantity() - $Quantity >= 0) {
            if ($index > 0) {
                $this->products[$index][1] = products[$index][1] + $Quantity;
            } else {
                $newProduct = array($Product, $Quantity);
                array_push($this->products, $newProduct);
                $Product->changeQuantity(-$Quantity);
            }
        } else {
            echo "Продукт закончился" . '</br>';
        }
    }

    public function removeProduct(Product $Product)
    {
        $index = $this->searchProduct($Product);
        if ($index > 0) {
            $Product->changeQuantity($this->products[$index][1]);
            array_splice($this->products, $index, 1);
        }
    }

    public function changeProductQuantity(Product $Product, int $Quantity)
    {
        $index = $this->searchProduct($Product);
        if ($index > 0) {
            $this->products[$index][1] = products[$index][1] + $Quantity;
        }
    }

    public function getProductList()
    {
        return $this->products;
    }

    private function searchProduct(Product $Product)
    {
        $index = 0;
        $wasFound = false;
        foreach ($this->products as $currentProd) {
            if ($currentProd[0] === $Product) {
                array_splice($this->products, $index, 1);
                $wasFound = true;
                break;
            }
            $index++;
        }
        if ($wasFound) {
            return $index;
        } else {
            return -1;
        }
    }
}

class BasketFactory
{
    public static function Create(Customer $Customer)
    {
        return new Basket($Customer);
    }
}
