<?php

$path = "personsNew2.xml";
$data = simplexml_load_file($path) or die("File can't load");
?>

<html>
    <head><title>Simple API for XML</title></head>
    <body>
        <h2>Person Details</h2>
        <table border = "1">
            <tr>
                <th>Person Name</th>
                <th>City</th>
                <th>Designation</th>
                <th>Age</th>
            </tr>


<?php
    foreach ($data->children() as $value){
?>
<tr>
    <td><?php echo $value->pname; ?></td>
    <td><?php echo $value->city; ?></td>
    <td><?php echo $value->designation; ?></td>
    <td><?php echo $value->age; ?></td>
</tr>



<?php
}

?>

        </table>
    </body>
</html>