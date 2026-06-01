<?php

    abstract class HumanAbstract
    {
        private $name;

        public function __construct(string $name)
        {
            $this->name = $name;
        }

        public function getName(): string
        {
            return $this->name;
        }

        abstract public function getGreetings(): string;

        abstract public function getMyNameIs(): string;

        public function introduceYourself(): string
        {
            return $this->getGreetings() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
        }
    }

    class RussianHuman extends HumanAbstract
    {
        public function getGreetings(): string
        {
            return 'Привет';
        }

        public function getMyNameIs(): string
        {
            return 'Меня зовут';
        }
    }

    class EnglishHuman extends HumanAbstract
    {
        public function getGreetings(): string
        {
            return 'Hello';
        }

        public function getMyNameIs(): string
        {
            return 'My name is';
        }
    }


    // 2. Cat с цветом

    class Cat
    {
        private $name;
        private $color;

        public function __construct(string $name, string $color)
        {
            $this->name = $name;
            $this->color = $color;
        }

        public function getName(): string
        {
            return $this->name;
        }

        public function getColor(): string
        {
            return $this->color;
        }

        public function sayHello(): string
        {
            return "Мяу! Меня зовут {$this->name}, и я {$this->color} кот.";
        }
    }


    // 3. Interface + get_class()

    interface CalculateSquare
    {
        public function getSquare();
    }

    class Rectangle implements CalculateSquare
    {
        public function getSquare()
        {
            return 20;
        }
    }

    class NoSquareClass {}

    class SquareInfoPrinter
    {
        public static function print($object)
        {
            if ($object instanceof CalculateSquare) {
                echo "Объект класса " . get_class($object) . " - площадь: " . $object->getSquare() . PHP_EOL;
            } else {
                echo "Объект класса " . get_class($object) . " не реализует интерфейс CalculateSquare" . PHP_EOL;
            }
        }
    }


    // 4. Lesson + PaidLesson

    class Lesson
    {
        public $title;
        public $text;
        public $homework;

        public function __construct($title, $text, $homework)
        {
            $this->title = $title;
            $this->text = $text;
            $this->homework = $homework;
        }
    }

    class PaidLesson extends Lesson
    {
        private $price;

        public function __construct($title, $text, $homework, float $price)
        {
            parent::__construct($title, $text, $homework);
            $this->price = $price;
        }

        public function getPrice(): float
        {
            return $this->price;
        }

        public function setPrice(float $price): void
        {
            $this->price = $price;
        }
    }

    // Тесты

    $russian = new RussianHuman("Иван");
    $english = new EnglishHuman("John");
    echo $russian->introduceYourself() . PHP_EOL;
    echo $english->introduceYourself() . PHP_EOL;
    echo "<br>";

    $cat = new Cat("Барсик", "серый");
    echo $cat->sayHello() . PHP_EOL;

    echo "<br>";

    // 3
    $rect = new Rectangle();
    $none = new NoSquareClass();

    SquareInfoPrinter::print($rect);
    SquareInfoPrinter::print($none);

    echo "<br>";

    // 4
    $lesson = new PaidLesson(
        "Урок о наследовании в PHP",
        "Лол, кек, чебурек",
        "Ложитесь спать, утро вечера мудренее",
        99.90
    );

    var_dump($lesson);