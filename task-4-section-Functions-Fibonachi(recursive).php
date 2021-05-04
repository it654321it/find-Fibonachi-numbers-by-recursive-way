<html>
<head> 
    <title>Задача 4 (розділ ФУНКЦІЇ)</title> 
    <meta charset="UTF-8"> </head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <b>Введіть двозначне число (до 20) для отримання відповідного ряду чисел Фібоначі:</b> 
    <input type="text" name="fiboNumber" size="10">
    <input type="submit" value="Надіслати">
</form>
<?php
// Вивеcти перших 20 чисел Фібоначі з допомогою ООП. Задачу зробити з рекурсією.
// Примітка - числами Фібоначі називають послідовність натуральних чисел, де перше число 1, друге 1, а кожне наступне - це сума двох попередніх. 

class CheckNumber 
{
  public function validNumber($num)
  {
    $pattern = '/^[0-9]{1,2}$/';

    if ( !preg_match($pattern, $num) ) {
        echo "Не правильно введено двозначне число (до 20) для отримання чисел Фібоначі. Повторіть спробу !<br>";
        $check = 0;
    }
    else {
        $check = $num;
    }

  return $check;
  }  
}

class FiboResult 
{
  public function getFibo($digits) 
  {
    echo '<br><b>Числа Фібоначі: </b>';
    for ($i=1; $i <= $digits; $i++) {

        if ($i < $digits) {
           echo self::recursiveFibo($i) . ', '; 
        }
        else {
           echo self::recursiveFibo($i);       
        }
    }
  }

  static public function recursiveFibo($n)
  {
    if ($n < 3) {
    	return 1; 
    }
   	else {
   		return self::recursiveFibo($n-1) + self::recursiveFibo($n-2);
    }
  }
}

$number = new CheckNumber();

error_reporting(0);

if ( !empty($_POST['fiboNumber']) ) {

	if ( $number->validNumber($_POST['fiboNumber']) > 0 ) {
		
     	$fiboNum = new FiboResult();
       	$fiboNum->getFibo($_POST['fiboNumber']);
  	}
}

?>
</body>
</html>