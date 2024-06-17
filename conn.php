<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost:3307";
$username = "root";
$password = "@Senhadoroot1";
$dbname = "bancoforms";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_REQUEST['nome'], $_REQUEST['email'], $_REQUEST['feedback'], $_REQUEST['avaliacao'])) {
        $nome = $_REQUEST['nome'];
        $email = $_REQUEST['email'];
        $feedback = $_REQUEST['feedback'];
        $avaliacao = $_REQUEST['avaliacao'];

        $sql = "INSERT INTO tabelaforms (nome, email, feedback, avaliação) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Error preparing the statement: " . $conn->error);
        }
        $stmt->bind_param("ssss", $nome, $email, $feedback, $avaliacao);
        if ($stmt->execute()) {
            echo "Dados enviados!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        die("Missing required fields");
    }
}
$conn->close();
?>
