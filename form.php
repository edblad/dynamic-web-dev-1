<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>Inlämningsuppgift 1 - Helena Edblad</title>
    
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

    include 'functions.php';
    include 'products.php';
    
?>
   
   <header>
       <div class="container">
           <h1>Min webbutik</h1>
       </div>
   </header>
    <main class="container">
        <div class="row">
            <div class="col-sm-8">
               <h2>Beställning</h2>
                <div class="white_box">
                    <?php 
                    // Echo the name and amount products that have been bought
                    if($_POST["name"] == "" || $_POST["address"] == "" || $_POST["phone"] == "" || $_POST["email"] == ""){
                        echo "<p class='red_text'>Du måste fylla i dina uppgifter!</p>";
                    }else{
                        foreach($_POST as $product => $amount) {
                            if(is_numeric($amount) && $amount > 0 && $product != 'phone'){
                                $bought_product = str_replace('_', ' ', $product);
                                echo '<div class="flex"><span class="product_label">' . $bought_product . '</span><span class="product_label text-right">' . $amount . ' st </span><span class="product_label text-right">' . check_price($product) . ' kr/st</span><span class="product_label text-right">' . product_sum($product, $amount) . ' kr</span></div>'; 
                            }
                        } ?>
                        
                        <div class="flex margin-top">Totalt: <span><?php echo check_amount() ?> st</span></div>
                        <div class="flex"><strong>Total kostnad: </strong><span><strong><?php echo total_sum(); ?> kr</strong></span></div>
                        
                    <?php } ?>
                    
                </div>
            </div>
            
            <div class="col-sm-4">
               <h2>Skickas till</h2>
                <div class="white_box">
                    <?php
                    if($_POST["name"] == "" || $_POST["address"] == "" || $_POST["phone"] == "" || $_POST["email"] == ""){
                        echo "<p class='red_text'>Du måste fylla i dina uppgifter!</p>";
                    }else{
                        echo "<p>" . $_POST["name"] . "<br />" . $_POST["address"] . "</p>";
                        echo "<p>" . $_POST["phone"] . "<br />" . $_POST["email"] . "</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>
                <a href="index.php">&#8592; Tillbaka</a>
            </p>
        </div>
    </footer>

    
    <!-- Latest compiled and minified JavaScript -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>