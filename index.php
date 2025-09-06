<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agricultural Marketplace</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f4f4f4;
      color: #333;
    }

    header {
      background: #2e7d32;
      color: white;
      padding: 20px;
      text-align: center;
    }

    h1 {
      margin: 0;
    }

    .container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      padding: 30px;
    }

    .category-card {
      background: white;
      padding: 20px;
      text-align: center;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      transition: transform 0.2s, box-shadow 0.2s;
    }

    .category-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 12px rgba(0,0,0,0.2);
    }

    .category-card a {
      text-decoration: none;
      color: #2e7d32;
      font-size: 18px;
      font-weight: bold;
      display: block;
      margin-top: 10px;
    }

    footer {
      background: #333;
      color: white;
      text-align: center;
      padding: 15px;
      margin-top: 40px;
    }
  </style>
</head>
<body>

<header>
  <h1>Agricultural Marketplace</h1>
  <p>Buy, Sell & Connect in Agriculture</p>
</header>

<div class="container">
  <div class="category-card">
    <img src="icons/animals.png" alt="Animals" width="80">
    <a href="animals.php">Animals</a>
  </div>
  <div class="category-card">
    <img src="icons/jobs.png" alt="Jobs" width="80">
    <a href="jobs.php">Jobs</a>
  </div>
  <div class="category-card">
    <img src="icons/machines.png" alt="Machines" width="80">
    <a href="machines.php">Machines</a>
  </div>
  <div class="category-card">
    <img src="icons/products.png" alt="Products" width="80">
    <a href="products.php">Products</a>
  </div>
  <div class="category-card">
    <img src="icons/properties.png" alt="Properties" width="80">
    <a href="properties.php">Properties</a>
  </div>
  <div class="category-card">
    <img src="icons/services.png" alt="Services" width="80">
    <a href="services.php">Services</a>
  </div>
  <div class="category-card">
    <img src="icons/source.png" alt="Source Materials" width="80">
    <a href="source.php">Source Materials</a>
  </div>
  <div class="category-card">
    <img src="icons/spare.png" alt="Spare Parts" width="80">
    <a href="spare.php">Spare Parts</a>
  </div>
</div>

<!-- Listings container -->
<div class="listings-container">
  <h2>Latest Listings</h2>
  <?php include("listings1.php"); ?>
</div>

<footer>
  <p>&copy; <?php echo date("Y"); ?> Agricultural Marketplace. All rights reserved.</p>
</footer>

</body>
</html>
