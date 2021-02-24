<?php
interface iUser
{
    function getName();
    function getSurname();
    function getPhone();
    function getEmail();
    function getAddress();
}

abstract class User implements iUser
{
    static int $idcounter = 0;
    private int $id;
    private string $name;
    private string $surname;
    private string $phone;
    private string $email;
    private string $address;

    public function __construct(string $Name, string $Surname = '', string $Phone, string $Email, string $Address)
    {
        $this->id = static::$idcounter;
        static::$idcounter = static::$idcounter + 1;
        $this->name = $Name;
        $this->surname = $Surname;
        $this->phone = $Phone;
        $this->email = $Email;
        $this->address = $Address;
    }

    public function GetName()
    {
        return $this->name;
    }

    function getSurname()
    {
        return $this->surname;
    }

    function getPhone()
    {
        return $this->phone;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getAddress()
    {
        return $this->address;
    }
}

interface iCourier
{
    function getWorktime();
    function getTransportType();
}

class Courier extends User implements iCourier
{
    private $worktime;
    private $transportType;

    public function __construct(string $Name, string $Surname = '', string $Phone, string $Email, string $Address, int $Worktime = 0, int $TransportType = 0)
    {
        $this->id = static::$idcounter;
        static::$idcounter = static::$idcounter + 1;
        $this->name = $Name;
        $this->surname = $Surname;
        $this->phone = $Phone;
        $this->email = $Email;
        $this->address = $Address;
        $this->worktime = $Worktime;
        $this->transportType = $TransportType;
    }

    public function getWorktime()
    {
        return $this->worktime;
    }

    function getTransportType()
    {
        return $this->transportType;
    }
}

class CourierFactory
{
    public static function Create(string $Name, string $Surname = '', string $Phone, string $Email, string $Address, int $Worktime = 0, int $TransportType = 0)
    {
        return new Courier($Name, $Surname, $Phone, $Email, $Address, $Worktime, $TransportType);
    }
}

interface iCustomer
{
    function getType();
    function getStatus();
    function setStatus(int $Status);
}

class Customer extends User implements iCustomer
{
    private static $types = array(
        0 => 'normal',
        1 => 'VIP'
    );
    private static $statuses = array(
        0 => 'new',
        1 => 'not active'
    );

    private $type;
    private $status;

    public function __construct(string $Name, string $Surname = '', string $Phone, string $Email, string $Address, int $Type = 0)
    {
        $this->id = static::$idcounter;
        static::$idcounter = static::$idcounter + 1;
        $this->name = $Name;
        $this->surname = $Surname;
        $this->phone = $Phone;
        $this->email = $Email;
        $this->address = $Address;
        $this->type = static::$types[$Type];
        $this->setStatus(0);
    }

    public function getType()
    {
        return $this->type;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus(int $Status)
    {
        $this->status = static::$statuses[$Status];
    }
}

class CustomerFactory
{
    public static function Create(string $Name, string $Surname = '', string $Phone, string $Email, string $Address, int $Type = 0)
    {
        return new Customer($Name, $Surname, $Phone, $Email, $Address, $Type);
    }
}
