<?php
// add.php – Inserts a new costume into the database
require 'db.php';

// Collect POST data
$name = $_POST['name'] ?? null;
$size = $_POST['size'] ?? null;
$category = $_POST['category'] ?? null;
$price = $_POST['price'] ?? null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Costume</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <h2>Kiwi Kloset</h2>
        <a href="index.php">Home</a>
    </nav>

    <main>
        <h1>Adding Costume</h1>
        <?php
        if ($name && $size && $category && $price) {
            $stmt = $conn->prepare("INSERT INTO costume (name, size, category, price) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sssd", $name, $size, $category, $price);

            if ($stmt->execute()) {
                echo "<p>Costume added successfully:</p>";
                echo "<ul>
                        <li>Name: " . htmlspecialchars($name) . "</li>
                        <li>Size: " . htmlspecialchars($size) . "</li>
                        <li>Category: " . htmlspecialchars($category) . "</li>
                        <li>Price: $" . htmlspecialchars($price) . "</li>
                      </ul>";
            } else {
                echo "<p class='error'>Error adding costume: " . $conn->error . "</p>";
            }
            $stmt->close();
        } else {
            echo "<p class='error'>Missing costume information.</p>";
        }
        ?>
    </main>
</body>
</html>
