

<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Christmas Search</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style type="text/css" id="diigolet-chrome-css">
        </style>


<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script>
    function runPHP(){
        var value=$("#searchIt").val();
        var spans=$("#count");
         $.ajax({
            type: "GET",
            url: "functions.php",
            dataType: "html",
            data: {passValue: value},
            success: function(response) {
            spans.text('');
            $("#count").append("The keyword '"+value+"' has been searched "+response+" time(s)"+"<br>");
            }
        });
    }
    function timeStampItUp(){
        var value=$("#searchIt").val();
         $.ajax({
            type: "GET",
            url: "timeStamp.php",
            dataType: "",
            data: {passValue: value},
            success: function(hello) {
                    $("#count").append(hello);
                
                
            }
        });
    }
    function searchItem() {
        var spans=$("#result");
        var filter="price:["+$("#part1").val()+" TO "+$("#part2").val()+"]";
        $.ajax({

            type: "get",
            url: "http://api.walmartlabs.com/v1/search",
            dataType: "jsonp",
            data: { 
                "query": $("#searchIt").val(),
                "format":"json",
                "facet.range":filter,
                "apiKey":"59cwnkhsspjya7djpwefdhup"
            },
            
            success: function(data,status) {
            spans.text('');
            for(var i=0;i<data['items'].length;i++){
                $("#result").append(data['items'][i].name+"<br>");
            }
            },
            complete: function(data,status) { //optional, used for debugging purposes
            }

        });//ajax
        
    } 
    
    
    
    
    
    
  
    
    
</script>

</head>

<body id="theBody">

   <h1> Christmas Gifts </h1>

    <form >
            Search:  <input id="searchIt" type="text"><br> 
            Price: <input id="part1" type="text" value=0> to <input id="part2" type="text" value=10000000><br>
            <input name="submitButton" type="button"  onclick="searchItem();runPHP();timeStampItUp();" value="Search">
           
    </form>
    <div id="result"></div>
    <div id="count"></span>

</div></body></html>