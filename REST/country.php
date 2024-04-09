<?php
    $path="Datasets/country-capitals.json";
    
    //to read json file through php
    $data=json_decode(file_get_contents($path),true); //decode json file
    //var_dump($data[0]); //to see the data inside of $data
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Countries Details</title>
        <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css" />
    
        <script>
            function showCountry(str) { //response part
                var xhttp;
                if (str == "") {
                  document.getElementById("show").innerHTML = ""; //document objet model
                  return;
                }
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() { //chacke if there is any state changes --- call back funnctions
                  if (this.readyState == 4 && this.status == 200) { //4=request finished and response is ready---if the request is success it shows in status.
                  document.getElementById("show").innerHTML = this.responseText; //using responsetext poperty -- we add responsetext to show
                  }
                };
                xhttp.open("GET", "getcountry.php?q="+str, true); //request part  --- true means asynchrronous method
                xhttp.send();
            }
        </script>
    </head>
    <body>
        <div class="container">
            <h2 class="text text-primary">Select a Country: 
                <select class="form-control" onchange="showCountry(this.value)">
                    <option value="">Please Select a Country</option>
                    <?php foreach($data as $v){ ?>
                    <option value="<?php echo $v['CountryName']; ?>"><?php echo $v['CountryName']; ?></option>
                    <?php } ?>
                </select>
            </h2>
        
            <div id="show">Load a country</div>
        
        
        </div>

        
    </body>
</html>
