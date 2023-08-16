<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Calculator</h1>
    <form action="calculator.php" method="post">
        <input type="number" name= "First_Number" placeholder="Fisrt Number" requirede>
        <input type="number" name= "Second_Number" placeholder="Second Number" required><br>
        <label> Select the operation you want to perform</label><br>
        <button  value="Addition" name="operation"> Addition + </button>
        <button value="Substraction" name="operation"> Substraction - </button>
        <button value="Multiplication" name="operation"> Multiplication x </button>
        <button value="Division" name="operation"> Division % </button><br>
        


        <?php

class Calculator {
    public $firstNumber;
    public $secondNumber;
    public $operation;
    public $result;

    public function __construct($firstNumber, $secondNumber, $operation) {
        $this->firstNumber = $firstNumber;
        $this->secondNumber = $secondNumber;
        $this->operation = $operation;
    }

    public function calculate() {
        switch ($this->operation) {
            case "Addition":
                $this->result = $this->firstNumber + $this->secondNumber;
                break;
            case "Substraction":
                $this->result = $this->firstNumber - $this->secondNumber;
                break;
            case "Multiplication":
                $this->result = $this->firstNumber * $this->secondNumber;
                break;
            case "Division":
                if ($this->secondNumber != 0) {
                    $this->result = $this->firstNumber / $this->secondNumber;
                } else {
                    $this->result = null;
                }
                break;
        }
    }

    public function getResult() {
        return $this->result;
    }
}

$firstNumber = $_POST["First_Number"];
$secondNumber = $_POST["Second_Number"];
$operation = $_POST["operation"];

$calculator = new Calculator($firstNumber, $secondNumber, $operation);
$calculator->calculate();

if ($calculator->getResult() !== null) {
    echo "Result: $calculator->firstNumber $calculator->operation $calculator->secondNumber = $calculator->result";
} else {
    echo "Division by zero is not allowed.";
}

?>



</body>
</html>