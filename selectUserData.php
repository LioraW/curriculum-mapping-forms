<?php
try {
    $last_id = $_SESSION["last_id"];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",
        $connUserName, $connPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT base, topic, coreConcept".
        " FROM curriculummap WHERE id = :last_id");
    $stmt->bindParam(':last_id', $last_id);
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //var_dump($stmt->fetchAll()[0]);
    $assocArray = $stmt->fetchAll()[0];
    $base = $assocArray["base"];
    $topic = $assocArray["topic"];
    $coreConcept = $assocArray["coreConcept"];
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
} finally {
    $conn = null;
}
?>
