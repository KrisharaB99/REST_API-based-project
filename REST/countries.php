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
    </head>
    <body>
        <div class="container">
            <h2 class="text text-primary">Countries Details</h2>
        
        <table border="1" class="table table-striped">
            <tr>
                <th>Country Name</th>
                <th>Capital Name</th>
                <th>Capital Latitude</th>
                <th>Capital Longitude</th>
                <th>Country Code</th>
                <th>Continent Name</th>
                
            </tr>
            
            <?php foreach($data as $v){ ?>
            <tr>
                <td><?php echo $v['CountryName']; ?></td>
                <td><?php echo $v['CapitalName']; ?></td>
                <td><?php echo round ((float)$v['CapitalLatitude'],2) ?></td>
                <td><?php echo round ((float)$v['CapitalLongitude'],2) ?></td>
                <td><?php echo $v['CountryCode']; ?></td>
                <td><?php echo $v['ContinentName']; ?></td>
            </tr>
                
           <?php }  ?>
            
        </table>
        
        </div>

        
    </body>
</html>
