<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../report-found.php');
    exit;
}

$finder_name = trim($_POST['finder_name'] ?? '');
$item_name = trim($_POST['item_name'] ?? '');
$description = trim($_POST['description'] ?? '');
$location = trim($_POST['location'] ?? '');
$date_found = trim($_POST['date_found'] ?? null);
$contact = trim($_POST['contact'] ?? '');

if ($finder_name === '' || $item_name === '' || $contact === '') {
    echo "<script>alert('Please fill required fields (Name, Item name, Contact).'); window.history.back();</script>";
    exit;
}

$stmt = $mysqli->prepare("INSERT INTO found_items (finder_name, item_name, description, location, date_found, contact) VALUES (?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    echo "Prepare failed: " . $mysqli->error;
    exit;
}
$stmt->bind_param("ssssss", $finder_name, $item_name, $description, $location, $date_found, $contact);

if ($stmt->execute()) {
    echo "<script>alert('Found item reported successfully!'); window.location.href='../index.html';</script>";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$mysqli->close();
