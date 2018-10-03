<?php
$con = mysqli_connect("localhost","root","","posparam_bk");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  //$var = CALL transaction_details(@a);
  // call stored procedure

  $result = mysqli_query($con, 
     "CALL transaction_det()") or die("Query fail: " . mysqli_error());

  while ($row = $result->fetch_assoc()) {
    mysqli_next_result($con);
    $terminal_id = $row['TERMINAL_ID'];
    $terminal_name = $row['TERMINAL_NAME'];
    $merchanit_id = $row['MERCHANT_ID'];
    $location_id = $row['LOCATION_ID'];
    $location_name = $row['LOCATION_NAME'];
    $currency_id = $row['CURRENCY_ID'];
    $currency_name = $row['CURRENCY_NAME'];
    $terminal_exid = $row['TERMINAL_EXID'];
    $osys_date = $row['OSYSDATE'];


//     if($terminal_exid === NULL)
//     {
//       $a = mt_rand(10000,99999); 
//       $terminal_exid = "BKP" + $a;
//     }
//     if($currency_id === NULL)
//     {
//       $currency_id = mt_rand(10000,99999);
//     }
//     if($currency_name === NULL)
//     {
//       $currency_name = "RWF";
//     }
//     $special = preg_replace('/[^A-Za-z0-9\-]/', '', $terminal_name);
// // check if data already is in transaction details table to avoid duplicates
    if (($terminal_exid IS NULL)||($currency_id IS NULL)||($currency_name IS NULL)){
  
      echo "Row contains a NULL value"
    }

 $sql1 = $con->query("SELECT count(*) AS counter FROM transaction_details WHERE TERMINAL_ID = $terminal_id and OSYSDATE = '$osys_date'");
 $row = $sql1->fetch_row();


if($row[0] >0){
   $sql2="DELETE * FROM transaction_data WHERE OSYSDATE=$osys_date and TERMINAL_ID = $terminal_id"
}
 elseif($row[0] ==0)
 {
  if($osys_date === NULL)
   {
    
    $osys_date=datetime();
  //    $sql = "INSERT INTO transaction_details (TERMINAL_ID, TERMINAL_NAME, MERCHANT_ID, LOCATION_ID, LOCATION_NAME, CURRENCY_ID, CURRENCY_NAME, TERMINAL_EXID)
  //     VALUES ($terminal_id, '$special', $merchanit_id, $location_id, '$location_name', $currency_id, '$currency_name', '$terminal_exid')";

  //     if ($con->query($sql) === TRUE) {
  //         echo "New record created successfully";
  //     } else {
  //         echo "Error: " . $sql . "<br>" . $con->error;
  //     }
  //   }
  //    else
  //   {
        $sql = "INSERT INTO transaction_details (TERMINAL_ID, TERMINAL_NAME, MERCHANT_ID, LOCATION_ID, LOCATION_NAME, CURRENCY_ID, CURRENCY_NAME, TERMINAL_EXID, OSYSDATE)
      VALUES ($terminal_id, '$special', $merchanit_id, $location_id, '$location_name', $currency_id, '$currency_name', '$terminal_exid', 
      '$osys_date'); DELETE * FROM transaction_data WHERE OSYSDATE=$osys_date and TERMINAL_ID = $terminal_id";

      if ($con->query($sql) === TRUE) {
          echo "New record created successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $con->error;
      }
    }
 }
 else
 {
  
 }
$con->close();
?>