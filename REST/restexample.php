<?php


////Mysqli - object oriened

$con=new mysqli("localhost","root","","soc2023it");
//$con=new PDO("mysql:host='localhost';dbname='soc2023it','root',''"); // This is the latest and commands 





$url1="https://www.hpb.health.gov.lk/api/get-current-statistical";
$data1=json_decode(file_get_contents($url1),true);
//var_dump($data1);

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://numbersapi.p.rapidapi.com/random/trivia?min=10&max=20&fragment=true&json=true",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: numbersapi.p.rapidapi.com",
		"X-RapidAPI-Key: d4e54d8258mshb94bb95cea982b8p191424jsnadc6b4868892"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$data2=json_decode($response,true);
        //var_dump($data2);
        $text=$data2['text']; 
        $number=$data2['number'];
        $type=$data2['type'];
       // var_dump($data2);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Countries Details</title>
        <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css" />
    
        
    </head>
    <body>
        <div>
            <div class="container-fluid">
                
                <table class = "table table-striped">
                    <tr>
                        <th>Number</th>
                        <th>Text</th>
                        <th>Type</th>
                    </tr>
                     <tr>
                        <td><?php echo $number; ?></td>
                         <td><?php echo $text; ?></td>
                          <td><?php echo $type; ?></td>
                    </tr>
                </table>
                
                    <div class="clearfix">&nbsp;</div>
                    
                    <table class = "table table-striped">
                    <tr>
                        <th>Update Date Time</th>
                        <th>Total Cases</th>
                        <th>Total Deaths</th>
                        <th>Total Recovered</th>
                    </tr>
                    
                    </tr>
                    <?php
                        $pcratr=$data1['data']['daily_pcr_testing_data'];
                        foreach($pcratr as $v){
                            $a=$v['date']; $b=$v['pcr_count'];
                            $sql="INSERT INTO pcr(pcr_date,count) VALUES('$a','$b')";
                            $con->query($sql);
                            ?>
                    
                    <tr>
                        <td><?php echo $data1['data']['update_date_time'];?></td>
                        <td><?php echo $data1['data']['local_total_cases'];?></td>
                        <td><?php echo $data1['data']['local_deaths'];?></td>
                        <td><?php echo $data1['data']['local_recovered'];?></td>
                    </tr>
                        <?php }?>
                    </table>
                    
                    <div class="clearfix">&nbsp;</div>
                    
                <h4 class="align-content-between">PCR Testing</h4>
                    <table class="table table-stripped">
                        <tr>
                            <th>Date</th>
                            <th>Count</th>
                        </tr>
                        <?php
                        $pcratr=$data1['data']['daily_pcr_testing_data'];
                        foreach($pcratr as $v){
                            $a=$v['date']; $b=$v['pcr_count'];
                            $sql="INSERT INTO pcr(pcr_date,count) VALUES('$a','$b')";
                            $con->query($sql);
                            ?>
                        <tr>
                            <td><?php echo $v['date']; ?></td>
                            <td><?php echo $v['pcr_count']; ?></td>
                        </tr>
                        <?php } ?>
                    </table>
            </div>
        </div>
        
    </body>
</html>
