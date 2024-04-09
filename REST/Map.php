<?php
$cLat=$_GET['cLat'];
$cLon=$_GET['cLon'];
$cCapital=$_GET['cCapital'];
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
      <div id="map" style="width:100%;height:400px;"></div>
<script>
function myMap() {
 const myLatLng = { lat: <?php echo $cLat; ?>, lng: <?php echo $cLon; ?> };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 5,
    center: myLatLng,
  });

  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "<?php echo $cCapital; ?>",
  });
}

</script>

<script 
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCF-hvTaPiyTKrYaGErP3QI6CxQOBW7Edo&callback=myMap"></script>   
    </body>
</html>
