<?php

$conn = mysqli_connect("localhost","root", "", "") or die ("No Connection");
mysqli_select_db($conn, "assignment") or die("No Database connected!");

?>