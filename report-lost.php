<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Report Lost - Lost & Found</title>
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

  <main class="container form-wrap">
    <h2>Report a Lost Item</h2>
    <form action="backend/submit_lost.php" method="post" class="form">
      <label>Your name <input name="name" required></label>
      <label>Item name <input name="item_name" required></label>
      <label>Description <textarea name="description" rows="4"></textarea></label>
      <label>Where you lost it <input name="location"></label>
      <label>Date lost <input type="date" name="date_lost"></label>
      <label>Contact info <input name="contact" required></label>
      <div class="form-actions">
        <button type="submit" class="btn">Submit</button>
        <a class="btn ghost" href="index.html">Cancel</a>
      </div>
    </form>
  </main>

  <footer class="footer">
    <div class="container">© <?=date('Y')?> Lost & Found Portal</div>
  </footer>
</body>
</html>
