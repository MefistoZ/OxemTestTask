<?php

abstract class animals
{//Абстрактный класс для наследования
    public abstract function getProducts();

    public function getNameClass()
    {
        return static::class;
    }
}

class Cow extends animals
{//Генерация коровы
    public $id;

    public function __construct()
    {
        $this->id = rand(9, 99999);
    }

    public function getProducts()
    {
        return rand(8, 12);
    }
}

class Hen extends animals
{//Генерация курицы
    public $id;

    public function __construct()
    {
        $this->id = rand(9, 99999);
    }

    public function getProducts()
    {
        return rand(0, 1);
    }
}

class Farm
{//Помещаем животных в амбар

    public $countLitersMilk = 0;
    public $countAgg = 0;
    public $animals = [];
    public $countProduct = [];


    public function createCow()
    {
        return new Cow();
    }

    public function createHen()
    {
        return new Hen();
    }

    public function generateNewCow($numberCow)
    {
        for ($i = 1; $i <= $numberCow; $i++) {
            $this->animals[] = $this->createCow();
        }
        return $this->animals;
    }

    public function generateNewHen($numberHen)
    {
        for ($i = 1; $i <= $numberHen; $i++) {
            $this->animals[] = $this->createHen();
        }
        return $this->animals;
    }

    public function sortProduct()
    {
        foreach ($this->animals as $animal) {//перебор по массиву
            switch ($animal->getNameClass()) {
                case "Cow"://Если имя класса "Cow" то определяем, что это корова
                    $this->countLitersMilk += $animal->getProducts();
                    break;
                case "Hen"://Если имя класса "Hen" то определяем, что это курица
                    $this->countAgg += $animal->getProducts();
                    break;
            }
        }
        $this->countProduct[] += $this->countLitersMilk;
        $this->countProduct[] += $this->countAgg;
        return $this->countProduct;

    }
}

$animal = new Farm();

$Hen = $animal->generateNewHen(20);
$Cow = $animal->generateNewCow(10);

$product = $animal->sortProduct();

echo "Молоко - ".$product[0]." л"."\n";
echo "Яйца - ".$product[1]." шт"."\n";







