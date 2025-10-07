<?php
require 'backend/db.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Items - Lost & Found</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <header class="topbar">
    <div class="container">
      <h1><a href="index.html">Lost & Found</a></h1>
      <nav>
        <a href="index.html">Home</a>
        <a href="view-items.php">View Items</a>
        <a href="report-lost.php">Report Lost</a>
        <a href="report-found.php">Report Found</a>
        <a href="about.html">About</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <h2>Lost Items</h2>
    <div class="cards">
    <?php
      $res = $mysqli->query("SELECT * FROM lost_items ORDER BY created_at DESC LIMIT 100");
      if ($res && $res->num_rows) {
          while ($r = $res->fetch_assoc()) {
              echo '<div class="card">';
              echo '<h3>' . htmlspecialchars($r['item_name']) . '</h3>';
              echo '<p><strong>Owner:</strong> ' . htmlspecialchars($r['name']) . '</p>';
              echo '<p><strong>Where:</strong> ' . htmlspecialchars($r['location']) . ' — <strong>Date:</strong> ' . htmlspecialchars($r['date_lost']) . '</p>';
              echo '<p>' . nl2br(htmlspecialchars($r['description'])) . '</p>';
              echo '<p><strong>Contact:</strong> ' . htmlspecialchars($r['contact']) . '</p>';
              echo '</div>';
          }
      } else {
          echo '<p>No lost items found.</p>';
      }
    ?>
    </div>

    <h2>Found Items</h2>
    <div class="cards">
    <?php
      $res2 = $mysqli->query("SELECT * FROM found_items ORDER BY created_at DESC LIMIT 100");
      if ($res2 && $res2->num_rows) {
          while ($r = $res2->fetch_assoc()) {
              echo '<div class="card">';
              echo '<h3>' . htmlspecialchars($r['item_name']) . '</h3>';
              echo '<p><strong>Finder:</strong> ' . htmlspecialchars($r['finder_name']) . '</p>';
              echo '<p><strong>Where:</strong> ' . htmlspecialchars($r['location']) . ' — <strong>Date:</strong> ' . htmlspecialchars($r['date_found']) . '</p>';
              echo '<p>' . nl2br(htmlspecialchars($r['description'])) . '</p>';
              echo '<p><strong>Contact:</strong> ' . htmlspecialchars($r['contact']) . '</p>';
              echo '</div>';
          }
      } else {
          echo '<p>No found items reported.</p>';
      }
      $mysqli->close();
    ?>
    </div>
  </main>

  <footer class="footer">
    <div class="container">© <?=date('Y')?> Lost & Found Portal</div>
  </footer>
</body>
</html>
