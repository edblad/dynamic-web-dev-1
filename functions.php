<?php

setlocale(LC_ALL, 'sv_SE');

// Changes the price depending on the day
function change_price($p){
    
    if(date("l") == "Monday"){
        $p = $p / 2;        
    }
    
    if(date("l") == "Wednesday"){
        $p = $p * 1.1;
    }
    
    if(date("l") == "Friday"){
        if($p > 200){
            $p = $p - 20;
        }
    }
    
    // Calculate week number
    $ddate = date("d-m-Y");
    $date = new DateTime($ddate);
    $weekString = $date -> format("W");
    $week = (int) $weekString;
    
    // Save time into a variable and make it an int so I can calculate on it
    $hour = date("H");
    $minute = date("i");
    $stringTime = $hour . $minute;
    $time = (int) $stringTime;

    if(date("d") % 2 == 0 && $week % 2 == 1 && ($time >= 1300 && $time <= 1700)){
        $p = $p * 0.95;
    }
    
    return $p;
}


// Calculates the sum of the whole buy
function total_sum(){
    
    $sum = 0;
    
    foreach($_POST as $product => $amount) {
        if(is_numeric($amount)){
            $sum = $sum + (change_price(check_price($product)) * $amount);
        }
    }
    return $sum;
}


// Checking the original price
function check_price($prod){
    include 'products.php';
        
    foreach($products as $product) {
        $attribute_name = str_replace('_', ' ', $prod);
        
        if($product['name'] == $attribute_name){
            return $product['price'];
        }
    }
}


// Returns the total amount of products bought
function check_amount(){
    
    $total_amount = 0;
    
    foreach($_POST as $product => $amount) {
        if($product != 'phone'){
            $a = (int) $amount;
            $total_amount = $total_amount + $a;
        }
    }
    return $total_amount;
}


// Calulates the sum of each product
function product_sum($product, $amount){
    include 'products.php';
    $sum = 0;
    
    return change_price(check_price($product)) * $amount;
}


// Check what day in the week it is and echo a string
function check_day($day){
    
    if($day == "Monday"){
        echo "har vi 50% på alla varor!!";
        
    }else if($day == "Tuesday"){
        echo "har vi inga erbjudanden.";
        
    }else if($day == "Wednesday"){
        echo "smyghöjer vi priserna.";
        
    }else if($day == "Thursday"){
        echo "har vi inga erbjudanden.";
        
    }else if($day == "Friday"){
        echo "kostar allt över 200kr 20kr mindre! Trevlig helg!";
        
    }else if($day == "Saturday"){
        echo "har vi inga erbjudanden. Trevlig helg!";
        
    }else if($day == "Sunday"){
        echo "har vi inga erbjudanden. Trevlig helg!";
    }
    
    // Calculate week number
    $ddate = date("d-m-Y");
    $date = new DateTime($ddate);
    $weekString = $date -> format("W");
    $week = (int) $weekString;
    
    // Save time into a variable and make it an int so I can calculate on it
    $hour = date("H");
    $minute = date("i");
    $stringTime = $hour . $minute;
    $time = (int) $stringTime;

    if(date("d") % 2 == 0 && $week % 2 == 1 && ($time >= 1300 && $time <= 1700)){
        echo "<p>Varorna levereras redan imorgon och du får 5 % rabatt på hela beställningen! Grattis!</p>";
    }
}