<?php
$result=null;
extract($_POST);
if(isset($calculate)){
    switch($expression){
        case'+':
        $result= $num1+$num2;
        break;
        case'-':
        $result= $num1-$num2;
        break;
        case '*':
        $result= $num1*$num2;
        break;
        case '/':
        $result= $num1/$num2;
        break;
        default:
        $result= "Invalid input or expression";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>
<body>
    <form method="post" action="">
        <input type="number" name="num1" value="<?php echo $num1 ?? ''; ?>" placeholder="Input any number"><br>
        <input type="number" name="num2" value="<?php echo $num2 ?? ''; ?>" placeholder="Input any number"><br>
        <input type="text" name="expression" placeholder="Enter expression: +, -, *, /"><br>
        <input type="submit" name="calculate" value="Calculate">
        <p><?php if($result!=null){ echo "Result: ". $result;}?></p>
    </form>
</body>
</html>
