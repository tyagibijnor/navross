<?php
/* 
 * This is used for filter records month year based.
 * Using Ajax call
 * @Navneet - 20th April 2020
 */
include_once('functions.php');
session_start();
$data = getJobsData();

foreach ($data as $jobs) {
   $response['data'][]  = $jobs;
 }
echo json_encode($response);
?>

