<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Result</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            background-color: black;
            color: #00ff00;
            text-align: center;
            padding: 20px;
        }
        input, select, button {
            margin: 5px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #00ff00;
            background-color: black;
            color: #00ff00;
        }
        button {
            cursor: pointer;
        }
    </style>
</head>
<body>
</body>
</html>

<?php
if(isset($_POST["submit"])){

    $input1=$_POST["input1"];
    $input2=$_POST["input2"];
    $input3=$_POST["input3"];

    $operator1= $_POST["operator1"];
    $operator2=$_POST["operator2"];

    function operation1 ($num1,$num2) {
        global $operator1;
        if($operator1 =="*"){
            return $num1*$num2;
        }
        elseif($operator1 =="/" && $num2 != 0){
            return $num1/$num2;
        }
        elseif($operator1 =="+" ) return $num1+$num2;
        elseif($operator1 =="-" ) return $num1-$num2;
        else return '';
    }

    function operation2 ($num2,$num3) {
        global $operator2;
        if($operator2 =="*"){
            return $num2*$num3;
        }
        elseif($operator2 =="/" && $num3 != 0){
            return $num2/$num3;
        }
        elseif($operator2 =="+" ) return $num2+$num3;
        elseif($operator2 =="-" ) return $num2-$num3;
        else return '';
    }

    function general_operation ($input1, $input2, $input3) {
        global $operator1;
        global $operator2;
        if ($operator1 =="+"){
            if(($operator2 =="*" || $operator2 =="/") && operation2($input2,$input3) != null){
                return $input1 + operation2($input2,$input3);
            }elseif($operator2 =="+" || $operator2 =="-"){
                return operation2(operation1($input1, $input2),$input3);
            }
            else return '';
        }
        elseif($operator1 =="-"){
            if(($operator2 =="*" || $operator2 =="/") && operation2($input2,$input3) != null){
                return $input1 - operation2($input2,$input3);
            }elseif($operator2 =="+" || $operator2 =="-"){
                return operation2(operation1($input1, $input2),$input3);
            }
            else return '';
        }
        elseif($operator1 =="*"){ 
            return operation2(operation1($input1, $input2),$input3);
        }
        elseif($operator1 =="/" && $input2 != 0 ){ 
            return operation2(operation1($input1, $input2),$input3);  
        }
        else return '';
    }

    $result=general_operation($input1, $input2, $input3);
    if (empty($result)) 
    print "Your result cannot be calculated<br>";
    else print "Your result is {$result}<br>";
}
?>