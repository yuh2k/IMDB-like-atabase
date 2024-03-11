<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "COSI127b";

$response = ['success' => false, 'message' => 'Unknown error.'];
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $email = $_POST['email'];
    $movieId = $_POST['movieId'];

    if (empty($email) || empty($movieId)) {
        throw new Exception("Email and movie ID must be provided.");
    }

    $stmt = $conn->prepare("SELECT * FROM User WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        $stmt = $conn->prepare("SELECT * FROM Likes WHERE uemail = ? AND mpid = ?");
        $stmt->execute([$email, $movieId]);
        if ($stmt->rowCount() == 0) {
            $stmt = $conn->prepare("INSERT INTO Likes (uemail, mpid) VALUES (?, ?)");
            $stmt->execute([$email, $movieId]);
            $response['success'] = true;
            $response['message'] = 'Movie liked successfully.';
        } else {
            $response['message'] = 'You have already liked this movie.';
        }
    } else {
        $response['message'] = 'Anonymous user cannot like movies.';
    }
} catch (PDOException $e) {
    $response['message'] = "Database error: " . $e->getMessage();
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}
header('Content-Type: application/json');
echo json_encode($response);