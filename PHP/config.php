<?php 

class Config{

private $a = 10;
private $b = 20;

private $password = "";
private $db_name = "";
public function sum () {
    $sum = $this->a + $this->b;
    
    echo "sum:" .$sum;
}
}
?>