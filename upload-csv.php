<?php
require('config.php');
$conn = getDb();

$file = fopen("employee.csv","r");
$i = 0;
$importData = [];
//import data from file
while (($getData = fgetcsv($file, 1000, ","))!== FALSE)
	{
		$num = count($getData);
        for ($j=0; $j < $num; $j++) {
        	$importData[$i][] = $getData[$j];
        }
        $i++;
	}
$skip = 0;
$log = [];
   // insert import data
   foreach($importData as $data){
   if($skip != 0){
     $username = $data[0];
   	 $created_date = $data[1];
	   // Checking duplicate entry
     $sql = "select count(*) as allcount from employee where username='" . $username . "'";
  	 $retrieve_data = $conn->query($sql);
     $row = $retrieve_data->fetch_array(MYSQLI_ASSOC);
     $count = $row['allcount'];
     if($count == 0){
       // Insert record
       $insert_query = "insert into employee(username, created_date) values('".$username."', CAST('".$created_date."' AS DATE))";
       $inserted_data = $conn->query($insert_query);
       $message = "SUCCESSS | " .$username. " inserted successfully |" .date('Y-m-d H:i:s');
       array_push($log, $message );
      } else {
        $message = "ERROR | Skipping: " .$username. " already exits | " .date('Y-m-d H:i:s');
  		      array_push($log, $message);
  	  }
    }
    $skip ++;
  }
fclose($file);
mysqli_close($conn);
//Write to log file
$file = 'log.txt';
if(!is_file($file)){
  $current = file_get_contents($file);
  foreach($log as $key => $value)
  {
        $current .= $value."\n";
  }
  file_put_contents($file, $current);
}

?>
