<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../report-lost.php');
    exit;
}

// Basic sanitization/trimming
$name = trim($_POST['name'] ?? '');
$item_name = trim($_POST['item_name'] ?? '');
$description = trim($_POST['description'] ?? '');
$location = trim($_POST['location'] ?? '');
$date_lost = trim($_POST['date_lost'] ?? null);
$contact = trim($_POST['contact'] ?? '');

// Simple required check (add more validation if you want)
if ($name === '' || $item_name === '' || $contact === '') {
    echo "<script>alert('Please fill required fields (Name, Item name, Contact).'); window.history.back();</script>";
    exit;
}

$stmt = $mysqli->prepare("INSERT INTO lost_items (name, item_name, description, location, date_lost, contact) VALUES (?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    echo "Prepare failed: " . $mysqli->error;
    exit;
}
$stmt->bind_param("ssssss", $name, $item_name, $description, $location, $date_lost, $contact);

if ($stmt->execute()) {
    echo "<script>alert('Lost item reported successfully!'); window.location.href='../index.html';</script>";
} else {
    echo "Error: " . $stmt->error;
}
$stmt->close();
$mysqli->close();

