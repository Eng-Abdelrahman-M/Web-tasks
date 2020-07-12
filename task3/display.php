<?php
if (isset($_POST['username'])) {
    $servername = "localhost";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $con=mysqli_connect($servername, $username,$password); 

if(! $con ) {
    echo "error in connect";
    die('Could not connect: ' . mysql_error());
 }

mysqli_select_db($con,"myDB");
$result=mysqli_query($con,"select * from deals");

if(! $result ) {
    echo "error in selsct";
    die('Could not get data: ' . mysql_error());
 }

while($data = mysqli_fetch_row($result))
{   


    $clientDeal_id = $data[0];
    $client_id = $data[1];
    $client_name =$data[2];
    $deal_id=$data[3];
    $deal_name=$data[4];
    $date=$data[5];
    $accepted= $data[6];
    $refused=$data[7];

    $return_arr[] = array("clientDeal_id" => $clientDeal_id,
                    "client_id" => $client_id,
                    "client_name" => $client_name,
                    "deal_id" => $deal_id,
                    "deal_name" => $deal_name,
                    "date" => $date,
                    "accepted" => $accepted,
                    "refused" => $refused,
                );
}
echo json_encode($return_arr);
mysqli_close($con);
}
?>