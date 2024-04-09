<?php



$c=$_GET['q'];

$path="Datasets/country-capitals.json";
$data=json_decode(file_get_contents($path),true);
foreach ($data as $v){
    if($v['CountryName']==$c){
        $cCode= $v['CountryCode'];
        $cContinent= $v['ContinentName'];
        $cCapital= $v['CapitalName'];
        $cLat= $v['CapitalLatitude'];
        $cLon= $v['CapitalLongitude'];
        
    }
}

$code=strtolower($cCode);
if($code != "null"){
    $pathc="https://restcountries.com/v3.1/alpha/$code";
    $datac=json_decode(file_get_contents($pathc),true);
    //var_dump($datac[0]);
    
    $flag=$datac[0]['flags']['png'];
    //echo $flag;
}
?>

<div>
    <div class="row">
        <div class="col-2">&nbsp;</div>
        <div class="col-8">
            <div class="clearfix">&nbsp;</div>
            <table class="table table-stripped">
                <tr>
                    <td colspan="2" style="text-align: center">
                        <img src="<?php echo $flag; ?>" />
                    </td>
                </tr>
                <tr>
                    <th>Country Name</th>
                    <th><?php echo $c; ?></th>
                </tr>
                <tr>
                    <th>Official Name</th>
                    <th><?php echo $datac[0]['name']['official']; ?></th>
                </tr>
                <tr>
                    <th>Continent</th>
                    <th><?php echo $cContinent; ?></th>
                </tr>
                <tr>
                      <th>Currencies</th>
                    <th><?php $arrc=$datac[0]['currencies'];
                foreach ($arrc as $v){
                print($v['name']); } ?></th>
                </tr>
                <tr>
                    <th>Subregion</th>
                    <th><?php 
                    if(empty($datac[0]['subregion'])){
                    } else {
                    echo $datac[0]['subregion']; }?></th>
                </tr>
                <tr>
                    <th>Capital</th>
                    <th><?php echo $cCapital; ?></th>
                </tr>
                <tr>
                    <th>Code</th>
                    <th><?php echo $cCode; ?></th>
                </tr>
                <tr>
                    <th>Languages</th>
                    <th><?php $arrl=$datac[0]['languages'];
                    echo join(", ",$arrl) ?></th>
                </tr>
                <tr>
                    <th>Population</th>
                    <th><?php echo $datac[0]['population']; ?></th>
                </tr>
                <tr>
                    <th>Area</th>
                    <th><?php echo $datac[0]['area']; ?></th>
                </tr>
               <tr>
                    <th>
                        
             <a href="Map.php?cLat=<?php echo $cLat;?>&cLon=<?php echo $cLon; ?>&cCapital=<?php echo $cCapital; ?>" 
                           target="_blank">Map Capital City</a>                      

                    </th>
                    <th>
                        
             <a href="<?php echo $datac[0]['maps']['googleMaps']; ?>" 
                           target="_blank">Country Map</a>                      

                    </th>
                </tr>
            </table>
            <div>
                <div>
                <iframe
     width="100%"
  height="250"
  
  frameborder="1" style="border:1"
  referrerpolicy="no-referrer-when-downgrade"
    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCF-hvTaPiyTKrYaGErP3QI6CxQOBW7Edo&q=<?php echo $c; ?>&zoom=4"
allowfullscreen>
                    
</iframe>
                </div>
                <div class="clearfix">&nbsp;</div>
            <div>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/iM12nF0tBuM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            
                </div>
        </div>
        <div class="col-2">&nbsp;</div>
    </div>
            </div>
</div>