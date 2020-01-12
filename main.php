<?php

abstract class animals
{//Абстрактный класс для наследования
    public abstract function getProducts();
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

    public function generateNewAnimals($numberAnimals, $animal)
    {
        for ($i = 1; $i <= $numberAnimals; $i++) {
            $this->animals[] = $animal;
        }
        return $this->animals;
    }

    public function sortProduct()
    {
        foreach ($this->animals as $animal) {//перебор по массиву
            switch (get_class($animal)) {
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

$hen = new Hen();
$cow = new Cow();

$Hen = $animal->generateNewAnimals(20, $hen);
$Cow = $animal->generateNewAnimals(10, $cow);

$product = $animal->sortProduct();

echo "Молоко - ".$product[0]." л"."\n";
echo "Яйца - ".$product[1]." шт"."\n";







