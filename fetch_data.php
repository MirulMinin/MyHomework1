<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "myhomework";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Homework.homework_id, Student.student_name, Subject.subject_name, Homework.homework_name, Homework.homework_due, Homework.homework_desc 
        FROM Homework 
        INNER JOIN Student ON Homework.student_id = Student.student_id 
        INNER JOIN Subject ON Homework.subject_id = Subject.subject_id";

$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>
