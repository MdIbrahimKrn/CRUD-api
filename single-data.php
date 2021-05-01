<?php
header( 'Content-Type: application/json' );
header( 'Access-Control-Allow-Origin: * ' );
include "config.php";

$id = mysqli_real_escape_string( $conn, $_GET["eid"] );
$query = "SELECT * FROM student WHERE ID = {$id} ;";
$result = mysqli_query( $conn, $query ) or die( "query faild" );
if ( mysqli_num_rows( $result ) > 0 ) {
    $rows = mysqli_fetch_all( $result, MYSQLI_ASSOC );
    $output = json_encode( $rows );
    echo $output;
} else {
    echo json_encode( ["massage" => "No record Found.", "status" => false] );
}
;
?>
