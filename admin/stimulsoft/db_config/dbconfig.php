<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 10/9/2017
 * Time: 10:52 PM
 */

$con=mysqli_connect("localhost","root","") or die("Connection Failed");
mysqli_select_db($con,"fitohm");
if($con){
    //echo("Connected");
}
else{
    echo("Error in Connection");
}