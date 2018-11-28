<!DOCTYPE html>
<html>
<head text-align:center >Sakila</head>

<body>
  <form action= "manager.html">
    <input type= "submit" value= "Return" >
  </form>
<?php
$connect=mysqli_connect("localhost","root","","sakila");
if(!$connect)

{

die("Error code 1.0");
//Error code 1 is cannot connect to database
}

$userQuery="
SELECT film.title, description, rating, rental_duration, rental_rate, `length`, category.name
FROM film_category
JOIN film on film.film_id=film_category.film_id
JOIN category on film_category.category_id = category.category_id
ORDER by title;";
$result=mysqli_query($connect, $userQuery);

if (mysqli_num_rows($result) == 0)

print("Error code 2.");
//Error code 2 is cannot find records from query.
else {
  echo "<table><th>title</th><th>description</th><th>rating</th><th>rental_duration</th><th>rental_rate</th><th>length</th><th>category</th>";
  while ($row= mysqli_fetch_assoc($result)){
    print("<tr><td>".$row['title']."</td><td> ".$row['description']."</td> <td> ".$row['rating']."</td><td style= 'text-align: center;>".$row['rental_duration']."</td><td>".$row['rental_rate']."</td><td> ".$row['length']."</td><td> ".$row['name']."</td></tr>");
  }
}


mysqli_close($connect);
?>
</body>
</html>
