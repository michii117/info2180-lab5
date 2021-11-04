<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country= strip_tags($_GET["country"]);
$context= strip_tags($_GET["context"]);

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if($context=="country"){
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>


<table>

  <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence Year</th>
    <th>Head of State</th>
  </tr>
  
    <?php foreach ($results as $row): ?>
      <tr>
        <td><?= $row['name'];?></td>
        <td><?= $row['continent'];?></td>
        <td><?= $row['independence_year'];?></td>
        <td><?= $row['head_of_state'];?></td>   
      </tr>   
    <?php endforeach; ?>  


</table>


<?php
}elseif($context=="cities"){
  $stmt = $conn->query(" SELECT c.id, c.name as city, c.country_code, cs.name as 
  country, c.name, c.population, c.district FROM cities c join countries cs on 
  c.country_code = cs.code WHERE cs.name LIKE '%$country%';");

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>


<table>

  <tr>
    <th>Name</th>
    <th>District</th>
    <th>Population</th>
  </tr>
  
    <?php foreach ($results as $row): ?>
      <tr>
        <td><?= $row['name'];?></td>
        <td><?= $row['district'];?></td>
        <td><?= $row['population'];?></td>
      </tr>   
    <?php endforeach; ?>  


</table>
<?php
}

?>


