<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <main>
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h2>Produkter</h2>
                   
                    <form action="form.php" method="POST">
                        <div class="">       
                        <?php 
                        foreach($products as $product) {
                            $attribute_name = $product['name'];
                            $attribute_name = str_replace(' ', '_', $attribute_name);

                            echo "<div class='product_item flex'><label class='product_label' for='" . $attribute_name . "'>" . $product['name'] . "</label>";
                            echo "<span class='product_label'>" . $product['color'] . "</span>";
                            echo "<span class='product_label'>" . $product['price'] . " kr</span>";
                            echo "<input type='number' name='" . $attribute_name . "' id='" . $attribute_name . "' class='product_input' /></div>";
                        } ?>
                        </div>
                        <div class="white_box">
                            <label for="name">Namn</label><br /> 
                            <input type="text" name="name" id="name" /> 

                            <label for="address">Adress</label><br /> 
                            <input type="text" name="address" id="address" />

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="phone">Telefon</label><br /> 
                                    <input type="tel" name="phone" id="phone" />
                                </div> 

                                <div class="col-sm-6">
                                    <label for="email">E-post</label><br /> 
                                    <input type="email" name="email" id="email" />
                                </div>
                            </div>

                            <input type="submit" class="btn btn-default" value="Skicka" />
                        </div>
                    </form>
                    
                </div>

                <div class="col-sm-4">
                    <h2>Erbjudanden</h2>
                    <div class="white_box">
                        <p>
                            Idag, 
                            <?php 
                            
                            $week_day = strtolower(strftime("%A"));
                            $date = strtolower(strftime("%e %B %Y"));
                            
                            echo $week_day; ?>en den <?php echo $date; ?>

                            <?php echo check_day(date("l")); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
<!--
    <footer>
        <div class="container">
            <p>
                <?php //echo strtolower(strftime("%A")); ?> den <?php //echo strtolower(strftime("%e %B %Y")); ?>
            </p>
        </div>
    </footer>
-->
    
    <!-- Latest compiled and minified JavaScript -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>