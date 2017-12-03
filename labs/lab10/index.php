<?php

  //print_r($_FILES);
  //echo "File size " . $_FILES['myFile']['size'];
  function createThumbnail($fileName){
      echo "<a class='thumb' href='#'>";
      echo "<img src='gallery/$fileName'/ height=150 width=150>";
      echo "<span><img src='gallery/$fileName' alt=''height=300 width=300/></span>";
      echo "</a>";
      
  }
  if($_FILES["myFile"]["size"]<1000001)
  {
       move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"] );
  
      $files = scandir("gallery/", 1);
     // print_r($files);
  
  
  }
 else{
     echo "<h2> ERROR FILE SIZE GREATER THAN 1MB </h2>";
 }
  
  for ($i = 0; $i < count($files) - 2; $i++) {
     
    createThumbnail($files[$i]);
      
  }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Photo Gallery </title>
    </head>
    <link href="css/style.css" alt="ok" rel="stylesheet" type="text/css" />
    <body>

    <h2> Photo Gallery </h2>
    <form method="POST" enctype="multipart/form-data"> 


        <input type="file" name="myFile" /> 
        
        <input type="submit" value="Upload File!" />

    </form>


    </body>
</html>