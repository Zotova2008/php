<?php
interface IStrategy
{
  function findCourier(int $DeliveryTime);
}
 
class CarDelivery implements IStrategy
{
  private $couriers;
 
  public function __construct(array &$Couriers)
  {
    $this->couriers = $Couriers;
  }
 
  public function findCourier(int $DeliveryTime)
  {
    echo "Начинаем поиск</br>";
    $returnArray = array();
    foreach($this->couriers as $courier)    
    {
        if ($courier->getTransportType()==0 && $courier->getWorktime()==$DeliveryTime)
        array_push($returnArray, $courier);
    }
    return $returnArray;
  }
}
 
class BikeDelivery implements IStrategy
{
    private $couriers;
  
    public function __construct(array &$Couriers)
    {
      $this->couriers = $Couriers;
    }
  
    public function findCourier(int $DeliveryTime)
    {
      $returnArray = array();
      foreach($this->couriers as $courier)    
      {
          if ($courier->getTransportType()==1 && $courier->getWorktime()==$DeliveryTime)
          array_push($returnArray, $courier);
      }
      return $returnArray;
    }
}


interface iDelivery
{
    function findCourier(IStrategy $strategy);
}

class Delivery implements iDelivery
{
    private Order $order;
    private $сourier; 
    private $couriers = array();

    public function __construct(Order &$Order, array &$Couriers)
    {
      $this->order=$Order;
      $this->couriers=$Couriers;  
    }

    public function getCourier()
    {
      return $this->сourier;
    }

    public function findCourier(IStrategy $strategy)
    {
       $returnMassive=$strategy->findCourier($this->order->getDeliveryTime());
       return $returnMassive;
    }
    
    public function setCourier()
    {
        $carCourier=$this->findCourier(new CarDelivery($this->couriers));
        $bikeCourier=$this->findCourier(new BikeDelivery($this->couriers));
        if(count($bikeCourier)>0){
          $this->сourier=$bikeCourier;
        }
        elseif(count($carCourier)>0){
          $this->сourier=$carCourier;
        }else echo "Курьеров нет:".'</br>';
    }
}

class DeliveryFactory
{
    public static function Create(Order $Order, array $Couriers)
    {
        return new Delivery($Order,$Couriers);
    }
}