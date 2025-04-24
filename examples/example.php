
<?php
//
//$n = 10;        // Задали N
//$sum = 0;         // Начальная сумма = 0
//$counter = 1;     // Счетчик начинаем с 1
//
//// Цикл работает, пока счетчик ($counter) меньше или равен N ($n)
//while ($counter <= $n) {
//    // Прибавляем текущее значение счетчика к сумме
//    $sum = $sum + $counter;
//    // Увеличиваем счетчик на 1 для следующего шага
//    $counter ++;
//}
//
//// Выводим результат после окончания цикла
//echo "Сумма всех чисел от 1 до " . $n . " равна: " . $sum . "\n";
//// Вывод будет: Сумма всех чисел от 1 до 10 равна: 55
//
//
//
//
//$n = 12;
//$counter = 0;
//
//
//while ($counter <= $n) {
//       if ($counter % 2 == 0) {
//           echo $counter . "<br> ";
//       }
//    $counter++;
//    }
//echo "\nГотово!\n";
//
//
//$startNumber = 25;
//$divisor = 7;
//
//while ($startNumber % $divisor !=0) {
//    $startNumber++;
//    if ($startNumber % $divisor == 0) {
//        echo "number is divisible by 7: " . $startNumber . "<br>";
//    }
//    else {
//        continue;
//    }
//
//
//}
//
//
//// улучшенная версия кода
//
//
//$startNumberInput = 25; // Сохраняем исходное значение
//$divisor = 7;
//
//// 1. Начинаем проверку с числа, СЛЕДУЮЩЕГО за $startNumberInput
//$currentNumber = $startNumberInput + 1;
//
//// 2. Цикл работает, ПОКА currentNumber НЕ делится на divisor
//while ($currentNumber % $divisor != 0) {
//    // Просто увеличиваем проверяемое число на 1
//    $currentNumber++;
//}
//
//// 3. Цикл остановился. Это значит, что УСЛОВИЕ while стало ЛОЖНЫМ,
////    то есть $currentNumber % $divisor РАВНО 0.
////    Значит, в $currentNumber находится искомое число. Выводим его ПОСЛЕ цикла.
//echo "Первое число больше " . $startNumberInput . ", которое делится на " . $divisor . ", это: " . $currentNumber . "\n";
//
//// Вывод: Первое число больше 25, которое делится на 7, это: 28
//
//
//
//$index = 0;
//    do {
//         echo "index: $index <br>";
//         $index++;
//     } while ($index <= 10);

//$colors = ['red', 'green', 'blue'];
//
//foreach ($colors as $color) {
//    echo "Color: $color <br>";;
//}


$person = ['name' => 'Daniil', 'age' => 30];

foreach ($person as $key => $value) {
    echo "$key: $value <br>";
} // вызываю ключ\значение для словаря


$numbers = [15, 22, 8, 4, 11, 30];

$totalSum = 0;
$counter = 0;

foreach ($numbers as $number) {

    $totalSum += $number;
    $counter++;

}

echo "The total sum is: $totalSum <br>";



$userData = [
    'firstName' => 'Анна',
    'lastName' => 'Петрова',
    'city' => 'Санкт-Петербург',
    'email' => 'anna.p@example.com',
    'status' => 'active'
];


foreach ($userData as $key => $value) {
    echo "$key : $value <br>";
}



$mixedNumbers = [5, -3, 10, 0, -8, 12, -1, 7];

$sumOfPositives = 0;

foreach ($mixedNumbers as $number) {

    if ($number > 0) {
        $sumOfPositives += $number;
    }
}

echo "Sum of positive numbers: $sumOfPositives <br>";



$data = ['red', 'blue', 'green', 'red', 'yellow', 'blue', 'red', 'green', 'red'];
// Или с числами: $data = [4, 7, 2, 4, 9, 7, 4, 2, 4];
$counter = 0;

$frequency = [];

foreach ($data as $item) {

    if (array_key_exists($item, $frequency) == true) {
        $frequency[$item]++;

    } else {

        $frequency[$item] = 1;
    }

}
print_r($frequency);

echo "<br>";

$userList = [
    [ // Первый пользователь (индекс 0)
        'name' => 'Алексей',
        'city' => 'Новосибирск',
        'age'  => 35
    ],
    [ // Второй пользователь (индекс 1)
        'name' => 'Ольга',
        'city' => 'Казань',
        'age'  => 28
    ],
    [ // Третий пользователь (индекс 2)
        'name' => 'Дмитрий',
        'city' => 'Екатеринбург',
        'age'  => 42
    ],
    [ // Четвертый пользователь (индекс 3)
        'name' => 'Светлана',
        'city' => 'Новосибирск',
        'age'  => 31
    ]
];


foreach ($userList as $userData => $user) {
    echo "$user[name] <br>";
}



$targetCity = 'Новосибирск';

$filteredUsers = [];

foreach ($userList as $userData => $user) {
    if ($user['city'] == $targetCity) {
        $filteredUsers[] = $user;
    }
}

print_r($filteredUsers);

echo "<br>";


$totalAge = 0;

for ($i = 0,$iMax = count($userList);$i < $iMax; $i++) {
    $currentUser = $userList[$i];
    $totalAge += $userList[$i]['age'];
    echo ("--- Пользователь #$i --- <br>");
        foreach ($currentUser as $key => $value) {
            echo "$key : $value <br>";
    }
}
$userCount = count($userList);
if ($userCount > 0) {
    $averageAge = $totalAge / $userCount;
}
echo ("Всего пользователей: $userCount <br>");
echo "Average age: $averageAge <br>";







