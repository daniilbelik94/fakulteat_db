<?php


//function greet() {
//    echo 'Hello';
//}
//
//greet();
//
//
//echo '<br>';
//
//function calculateRacteAngel($width, $length) {
//    return $width * $length;
//}
//
//echo calculateRacteAngel(10, 20);  // таким образом мы умножаем длинну на ширину чтобы получать
////площадь треугольника
//
//// при создавниии функции мы описываем ее и даем ей два параметра и возвращаем через return
//
//
//// функции можно вернуть через присвоении константы
//
//// например
//echo '<br>';
//function getAge($dateOfBirth) {
//    return 2025 - $dateOfBirth;
//}
//
//$sum = getAge(1988);
//
//echo $sum;
//
//echo '<br>';
//
//function calculateSum($a, $b) {
//    return $a + $b;
//}// обозначаем функцию
//
//$sum = calculateSum(10, 20); //задаем переменную
//
//echo "the sum of A and B is {$sum}<br>"; //вызываем переменную
//
//
//
//
////=====
//
//
///**
// * @param $number
// * @return bool
// */
//function isEven($number) {
//        if ($number % 2 == 0) {
//            return true;
//        } else {
//            return false;
//        };
//}
//
//echo isEven(12);
//
//echo '<br>';
//
//$number = 13;
//
//if (isEven($number)) {
//    echo "The number {$number} is even.";
//} else {
//    echo "The number {$number} is odd.";
//


$name = 'Daniil';

$age = 30;

if ($age >= 13 && $age <= 17) {
    echo "{$name} you are a child!";
}

elseif ($age >= 18 && $age <= 64) {
     echo "{$name}, you are adult!";
} else {
     echo "{$name} You are an old man!";
};

echo '<br>';
$purchaseAmount = 2400;

$discount = 10;

if ($purchaseAmount >= 1000) {
    echo "You have a great deal and receive a discount 10%! Now your total is: " . ($purchaseAmount - ($purchaseAmount * $discount / 100));
}


echo '<br>';
date_default_timezone_set('Europe/Berlin');
function greetUserWithTime($name) {
    $hour = date('H'); // возвращаем дату в часах
    $greeting = ''; // создаю переменную для хранения приветствия(после будет меняться от времени суток)
    return ($hour >= 5 && $hour < 12) // Условие для утра (5:00 - 11:59)
        ? "Good Morning, {$name}!"
        : (($hour >= 12 && $hour < 18) // Иначе, условие для дня (12:00 - 17:59)
            ? "Good Afternoon, {$name}!"
            : (($hour >= 18 && $hour < 21) // Иначе, условие для вечера (18:00 - 20:59)
                ? "Good Evening, {$name}!"
                : "Good Night, {$name}!" // Иначе (21:00 - 4:59) - Ночь
            ) // Закрываем скобку для условия вечера/ночи
        ); // Закрываем скобку для условия дня/(вечера/ночи)
}

$username = 'Daniil';
echo greetUserWithTime($username);

echo '<br>';
for($index = 0; $index <= 5; $index++) {
    echo "Index: $index  <br> ";
}

echo '<br>';
$index = 0; // задаю индекс
while ($index <= 5) { // делаю цикл от 0 до 5
    echo "Index: $index\n  <br> "; // вызываю индекс
    $index++; //добавляю новые строки до 5
}
