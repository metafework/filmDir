<?php

$title=$_POST['title'];
$description=$_POST['description'];
$release_year=(int)$_POST['release_year'];
$language_ID=(int)$_POST['language_ID'];
$rental_Duration=(int)$_POST['rental_duration'];
$rental_Rate=(float)$_POST['rental_rate'];
$length=(int)$_POST['length'];
$replacement_cost=(float)$_POST['replacement_cost'];
$ratings=$_POST['ratings'];
$special_features=[];
if (!empty($_POST['special_feature'])){
  foreach($_POST['special_feature'] as $sfItem){
    array_push($special_features, $sfItem);
  }
}else{ array_push($special_features, "N/A");}
$sSpecial_features= implode(" ,",$special_features);

//Connect to Database
$connect=mysqli_connect("localhost","root","","sakila");
if(!$connect)
{
die("Error code 1.1");//Error code 1 is cannot connect to database
}else{

//Run query
$userQuery="
INSERT INTO film (title,description,release_year,language_ID,rental_duration ,rental_rate,length,replacement_cost,rating,special_features )
VALUES('$title','$description','$release_year',$language_ID, $rental_Duration,$rental_Rate, $length, $replacement_cost, '$ratings', '$sSpecial_features');
";

$results= mysqli_query($connect,$userQuery);
mysqli_close($connect);
}
//Check for successful query
/*if (mysqli_num_rows($results) == 0)
print("Error code 2."); //Error code 2 is cannot find records from query.
else {*/
if ($results){
print($title." added successfully. ");
}else{
  print("err");

}

echo "<form action= \"manager.html\">
  <input type= \"submit\" value= \"Return\" >
</form>"




 ?>
