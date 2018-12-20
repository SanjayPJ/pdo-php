  <?php 

function classicmodels($str) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blogapp";
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($str);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

classicmodels("INSERT INTO posts (title, body) VALUES ('this is a simple title', 'sample body')");
classicmodels("UPDATE posts SET title='title1', body='title2' WHERE id=3");
classicmodels("DELETE FROM posts WHERE id=3");

?>
