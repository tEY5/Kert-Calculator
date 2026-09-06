<!DOCTYPE html>
<HTML> 
<BODY>
  
<FORM Method= "post">
<input type= "number" name= "a" placeholder= "number 1">
<input type= "number" name= "b" placeholder= "number 2">

<select name= "op">
  <option>+</option>
  <option>-</option>
  <option>*</option>
  <option>/</option>     
</select>

<button name= "calc">calculate</button> 

</FORM>
</BODY>
</HTML>

<?php


if (isset($_POST["calc"])){
$i= $_POST["a"];
$j= $_POST["b"];
$k= $_POST["op"];


if((!$i=="")&&(!$j=="")){
  switch($k){
    case'+':
      echo $result=$i+$j;
    break;
    case"-":
      echo $result=$i-$j;
    break;
    case'*':
      echo $result=$i*$j;
    break;
    case"/":
      echo $result=$i/$j;
    break;
  }
} else{
 echo "none";
}

}
?>