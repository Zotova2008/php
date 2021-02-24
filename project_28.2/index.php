<?php
include_once 'shop.php';
$shop = new Shop;
$productList = $shop->getShopProductList();
$product1 = $productList->addProduct('Молоко', 23);
$product2 = $productList->addProduct('Творог', 5);
$product3 = $productList->addProduct('Кефир', 14);
$courierList =  $shop->getShopCourierList();
$courierList->addCourier('Александр', 'Александров', '+79998887766', '12@ya.ru', 'Москва', 0, 1);
$courierList->addCourier('Иван', 'Иванов', '+71111111111', 'ii@ya.ru', 'Владивосток', 1, 0);
$customerList =  $shop->getShopCustomerList();
$customerList->addCustomer('Василий', 'Васильев', '+71111111111', 'ii@ya.ru', 'Владивосток', 1);
$customerList->addCustomer('Петр', 'Петров', '+71111111111', 'ii@ya.ru', 'Владивосток', 0);
$basketList = $shop->getShopBasketList();
$customer =  $customerList->getCustomer(0);
$customerBasket = $basketList->getCustomerBasket($customer);

$customerBasket->addProduct($product1, 10);
$customerBasket->addProduct($product2, 5);
$customerBasket->addProduct($product3, 6);

echo "Осталось в первом продукте: " . $product1->getQuantity() . '</br>';
echo "Осталось во втором продукте: " . $product2->getQuantity() . '</br>';
echo "Осталось в третьем продукте: " . $product3->getQuantity() . '</br>';
echo 'Сейчас в корзине:</br>';
print_r($customerBasket);
echo '</br>';
$order = $shop->checkout($customerBasket);
echo 'Сейчас в заказе:</br>';
print_r($order);
echo '</br>';
echo 'Сейчас в корзине все товары удалены:</br>';
print_r($customerBasket);
//создаём ручками
echo '</br>';
echo 'Создаём доставку для заказа:</br>';
$deliveryList = $shop->getShopDeliveryList();
$delivery = $deliveryList->addDelivery($order, $courierList->getCourierList());
$delivery->setCourier();
echo "-Курьер" . print_r($delivery->getCourier());
