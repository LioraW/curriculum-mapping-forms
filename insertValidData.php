<?php
if ($isValid) {
    try {
         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $connUserName, $connPassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $conn->prepare("INSERT INTO curriculummap (base, topic, coreConcept)
			VALUES (:base, :topic, :coreConcept)");

        $sql->bindParam(':base', $base);
        $sql->bindParam(':topic', $topic);
        $sql->bindParam(':coreConcept', $coreConcept);
        $sql->execute();
        $last_id = $conn->lastInsertId();
        $_SESSION["last_id"] = "$last_id";
        header("Location: confirmation.php");
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    } finally {
        $conn = null;
    }
}