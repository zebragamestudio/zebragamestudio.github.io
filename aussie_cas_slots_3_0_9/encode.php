<?php
  //  header("Content-type: application/json; charset=utf-8");
    function csr($string, $n2) {
        $result = '';
        $length = strlen($string);
    
        for ($i = 0; $i < $length; $i++) {
            $c2 = $string[$i];
            
            if ($c2 >= 'a' && $c2 <= 'z') {
                $c3 = chr(ord($c2) + $n2);
                if ($c3 > 'z') {
                    $c3 = chr(ord($c3) - 26); // Оборачивание в пределах 'a-z'
                } elseif ($c3 < 'a') {
                    $c3 = chr(ord($c3) + 26); // Обратное оборачивание
                }
                $result .= $c3;
            } elseif ($c2 >= 'A' && $c2 <= 'Z') {
                $c4 = chr(ord($c2) + $n2);
                if ($c4 > 'Z') {
                    $c4 = chr(ord($c4) - 26); // Оборачивание в пределах 'A-Z'
                } elseif ($c4 < 'A') {
                    $c4 = chr(ord($c4) + 26); // Обратное оборачивание
                }
                $result .= $c4;
            } elseif ($c2 >= 'А' && $c2 <= 'Я') {
                $c5 = chr(ord($c2) + $n2);
                if ($c5 > 'Я') {
                    $c5 = chr(ord($c5) - 32); // Оборачивание в пределах 'А-Я'
                } elseif ($c5 < 'А') {
                    $c5 = chr(ord($c5) + 32); // Обратное оборачивание
                }
                $result .= $c5;
            } elseif ($c2 >= 'а' && $c2 <= 'я') {
                $c6 = chr(ord($c2) + $n2);
                if ($c6 > 'я') {
                    $c6 = chr(ord($c6) - 32); // Оборачивание в пределах 'а-я'
                } elseif ($c6 < 'а') {
                    $c6 = chr(ord($c6) + 32); // Обратное оборачивание
                }
                $result .= $c6;
            } else {
                $result .= $c2; // Остальные символы не меняются
            }
        }
    
        return $result;
    }

    // Пример использования
    $s1 = "//..123-:,&zzzzzzZZZZZZ"; // Исходная строка
    $s2 = "f68d89e8-g4dg-42c3-8e53-901c34gf081e"; // Закодированная строка
    
//    echo "encode - " . csr($s1, 1) . PHP_EOL; // Кодирование
//    echo "decode - " . csr($s2, -1) . PHP_EOL; // Декодирование

?>