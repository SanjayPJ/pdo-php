<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  <tbody>
<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "classicmodels";
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT customerName, addressLine1 FROM customers WHERE customerNumber=:customer_number");
        $stmt->execute(['customer_number' => 475]);
        $result = $stmt->fetch();
        ?>
            <tr>
                <td><?php echo $result['customerName'] ?></td>
                <td><?php echo $result['addressLine1'] ?></td>
            </tr>
        <?php
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>
    </tbody>
</table>
</div>