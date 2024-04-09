<?php

$path = "personsNew2.xml";
$data = new DOMDocument();
$data->load($path); //load data in $path to $data
$xmldata = $data->documentElement; //load elements of $data to $xmldata
$pname = $xmldata->getElementsByTagName('pname'); //get details pf pname tag
$city = $xmldata->getElementsByTagName('city');
$designation = $xmldata->getElementsByTagName('designation');
$age = $xmldata->getElementsByTagName('age');

var_dump($pname->length); //to load all data

for($i=0; $i<$pname->length;$i++){
    echo $pname->item($i)->childNodes->item(0)->nodeValue;
    echo " ";
    echo $city->item($i)->childNodes->item(0)->nodeValue;
    echo " ";
    echo $designation->item($i)->childNodes->item(0)->nodeValue;
    echo " ";
    echo $age->item($i)->childNodes->item(0)->nodeValue;
    echo "<hr/>";
}

echo "<hr/>";
echo "<h2>Person Details</h2>";
echo "<table border = '1'>";
echo "<tr><th>Person Name</th><th>City</th>";
echo "<th>Designation</th><th>Age</th>";
echo "</tr>";

for($j=0;$j<$pname->length;$j++){ //put data into table
    echo "<tr>";
    echo "<td>".$pname->item($j)->childNodes->item(0)->nodeValue."</td>";
    echo "<td>".$city->item($j)->childNodes->item(0)->nodeValue."</td>";
    echo "<td>".$designation->item($j)->childNodes->item(0)->nodeValue."</td>";
    echo "<td>".$age->item($j)->childNodes->item(0)->nodeValue."</td>";
}

echo "</table>";



?>

