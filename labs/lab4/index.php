<?php

    $backgroundImage = "img/sea.jpg";

    if(isset($_GET['keyword'])) {
     
     //  echo "Keyword typed: " . $_GET['keyword'];
        
        include 'api/pixabayAPI.php';
        
        $keyword = $_GET['keyword'];
        
        if (!empty($_GET['category'])) {  //User selected a category
             
            $keyword = $_GET['category'];
        }
        
        if (isset($_GET['layout'])) {
            
            $imageURLs = getImageURLs($keyword, $_GET['layout']);
        } else {
        
            $imageURLs = getImageURLs($keyword);
        }
        
        
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
    
    function checkIfSelected($option) {
        
        if ($option == $_GET['category']) {
            
            return "selected";
            
        }
        
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 4: Carousel</title>
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            @import url("css/styles.css");
            
            body {
                background-image: url(<?=$backgroundImage?>);
            }
        </style>
    </head>
    <body>
        <br>
        
         <form>
            <input type="text" name="keyword" placeholder="keyword" value="<?=$_GET['keyword']?>"/>
            
            <input type="radio" id="lhorizontal" name="layout" value="horizontal" <?= ($_GET['layout']=='horizontal')?"checked":""  ?> >
            <label for="lhorizontal"> Horizontal </label>
            
            <input type="radio" id="lvertical" name="layout" value="vertical" 
            
             <?php
                if ($_GET['layout']=="vertical") {
                    echo "checked";
                }
             
             ?>
            
            >
            
            <label for="lvertical"> Vertical </label>
            
            <select name="category">
                <option value="">Select One</option>
                <option <?=checkIfSelected('ocean')?> value="ocean">Sea</option>
                <option <?=checkIfSelected('Forest')?> >Forest</option>
                <option <?=checkIfSelected('Mountain')?>>Mountain</option>
                <option <?=checkIfSelected('Otter')?>>Otter</option>
                <option <?=checkIfSelected('Baseball')?>>Baseball</option>
            </select>
            
            <input type="submit" value="Search"/>
        </form>
        
       
        <br /><br />
        
        <?php
            if(!isset($_GET['keyword'])) {//form has not been submitted
                echo "<h2>Type a keyword to display a slideshow with random images from Pixabay.com</h2>";
            } else {//form has been submitted
                
                  if(empty($_GET['keyword'])&& empty($_GET['category'])){
            echo "<h2 style='color:red' > Error! You must enter a keyword or category </h2>";
            return;
            exit;
                  }
                
                
        ?>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php
                    for($i = 0; $i < 5; $i++) {
                        echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                        echo ($i == 0) ? "class='active'" : "";
                        echo "></li>";
                    }
                ?>
            </ol>
            
            <div class="carousel-inner" role="listbox">
                <?php
                    for($i = 0; $i < 5; $i++) {
                        do {
                            $randomIndex = rand(0, count($imageURLs));
                        } while(!isset($imageURLs[$randomIndex])); 
                        
                        echo '<div class="item ';
                        echo ($i == 0) ? "active" : "";
                        echo '">';
                        echo '<img src="' . $imageURLs[$randomIndex] . '">';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
            </div>
        
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        <?php
            }
        ?>
        <br>
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>