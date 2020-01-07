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

class Granary
{//Помещаем животных в амбар

    public function createCow()
    {
        return new Cow();
    }

    public function createHen()
    {
        return new Hen();
    }

}


$granary = new Granary();
$animals = [];//Создоние общего массива с животными

for ($i = 0; $i <= 10; $i++) {//заполняем массив коровами
    $animals[] = $granary->createCow();
}

for ($i = 0; $i <= 20; $i++) {//заполняем массив курицами
    $animals[] = $granary->createHen();
}

$countLitersMilk = 0;
$countAgg = 0;

foreach ($animals as $animal) {//перебор по массива
    switch ($animal->getNameClass()) {
        case "Cow"://Если имя класса "Cow" то определяем, что это корова
            $countLitersMilk += $animal->getProducts();
            break;
        case "Hen"://Если имя класса "Hen" то определяем, что это курица
            $countAgg += $animal->getProducts();
            break;
    }

}
echo "Молоко - ".$countLitersMilk." л"."\n";
echo "Яйца - ".$countAgg." шт"."\n";





