<?php

  //print_r($_FILES);
  //echo "File size " . $_FILES['myFile']['size'];
    $counter;
  function createThumbnail($fileName){
      global $counter;
      $counter++;
      $sourceFile=imagecreatefromstring(file_get_contents("gallery/".$fileName));
      $newx=150;$newy=150;
      $thumb=imagecreatetruecolor($newx,$newy);
      imagecopyresampled($thumb,$sourceFile,0,0,0,0,$newx,$newy,imagesx($sourceFile),imagesy($sourceFile));
      $newName="thumb".$counter.".jpg";
      imagejpeg($thumb,$newName);
      echo "<a class='thumb' href='#'>";
      echo "<img src='$newName'/>";
      echo "<span><img src='gallery/$fileName' alt=''/></span>";
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
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <body>

    <h2> Photo Gallery </h2>
    <form method="GET"> 


        <input type="file" name="myFile" /> 
        
        <input type="submit" value="Upload File!" />

    </form>


    </body>
</html>