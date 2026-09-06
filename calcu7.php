<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method= "post">

<input type="number" name="a" placeholder="number 1">
<input type="number" name="b" placeholder="number 2">

<select name="op">

<option>+</option>
<option>-</option>
<option>*</option>
<option>/</option>

</select>

<button name="calc">calculate</button>

</form>

</body>
</html>

<?php

if (isset($_POST["calc"])){

$a=$_POST["a"];
$b=$_POST["b"];
$c=$_POST["op"];

if ((!$a=="")&&(!$b=="")){

switch ($c){
case '+':
    echo $a+$b;
    break;
    case '-':
    echo $a-$b;
    break;
    case '*':
    echo $a*$b;
    break;
    case '/':
    echo $a/$b;
    break;



}

} else {
    echo "please enter a valid number";
}


}

?>
