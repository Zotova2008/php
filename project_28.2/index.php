<?php
include_once 'shop.php';
$shop = new Shop;
$productList = $shop->getProductList();
$product1 = $productList->addProduct('Молоко', 23);
$product2 = $productList->addProduct('Творог', 5);
$product3 = $productList->addProduct('Кефир', 14);
$courierList =  $shop->getCourierList();
$courierList->addCourier('Александр', 'Александров', '+79998887766', '12@ya.ru', 'Москва', 0, 1);
$courierList->addCourier('Иван', 'Иванов', '+71111111111', 'ii@ya.ru', 'Владивосток', 1, 0);
$customerList =  $shop->getCustomerList();
$customerList->addCustomer('Василий', 'Васильев', '+71111111111', 'ii@ya.ru', 'Владивосток', 1);
$customerList->addCustomer('Петр', 'Петров', '+71111111111', 'ii@ya.ru', 'Владивосток', 0);
$basketList = $shop->getBasketList();
$customer =  $customerList->getCustomer(0);
$customerBasket = $basketList->getCustomerBasket($customer);
$customerBasket->addProduct($product1, 10);
$customerBasket->addProduct($product2, 5);
$customerBasket->addProduct($product3, 6);
echo "Остаток Молока: " . $product1->getQuantity() . '</br>';
echo "Остаток Творога: " . $product2->getQuantity() . '</br>';
echo "Остаток Кефира: " . $product3->getQuantity() . '</br>';
echo 'Сейчас в корзине:</br>';
print_r($customerBasket);
echo '</br>';
$order = $shop->check($customerBasket);
echo 'Состояние заказа:</br>';
print_r($order);
echo '</br>';
echo 'Удаленные из корзины товары:</br>';
print_r($customerBasket);
echo '</br>';
$deliveryList = $shop->getDeliveryList();
$delivery = $deliveryList->addDelivery($order, $courierList->getCourierList());
$delivery->setCourier();
echo "Товар готов к отправке.";
echo '</br>';
echo "Ваш курьер:";
print_r($delivery->getCourier());
