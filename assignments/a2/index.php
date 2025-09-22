<?php
// index.php – Homepage for Kiwi Kloset Staff
require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kiwi Kloset Staff Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation bar -->
    <nav>
        <h2>Kiwi Kloset</h2>
        <a href="index.php">Home</a>
    </nav>

    <main>
        <h1>Kiwi Kloset: Staff Portal</h1>
        <!-- Costumes Table -->
        <h2>All Costumes</h2>
        <?php
        $sql = "SELECT * FROM costume";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>ID</th><th>Name</th><th>Size</th><th>Category</th><th>Price</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['costume_id']) ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['size']) ?></td>
                        <td><?= htmlspecialchars($row['category']) ?></td>
                        <td>$<?= htmlspecialchars($row['price']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p class="error">No costumes found or query failed.</p>
        <?php endif; ?>

        <!-- Form: View Rentals -->
        <h2>Find Rentals by Costume ID</h2>
        <form method="get" action="rentals.php">
            <label>Costume ID: <input type="number" name="id" required></label>
            <button type="submit">View Rentals</button>
        </form>

        <!-- Form: Add Costume -->
        <h2>Add a New Costume</h2>
        <form method="post" action="add.php">
            <label>Name: <input type="text" name="name" required></label><br>
            <label>Size: <input type="text" name="size" required></label><br>
            <label>Category: <input type="text" name="category" required></label><br>
            <label>Price: <input type="number" step="0.01" name="price" required></label><br>
            <button type="submit">Add Costume</button>
        </form>
    </main>
</body>
</html>
