<?php
echo "<h1>PHP MySQL Extension Test</h1>";

// Check if MySQL extension is loaded
if (extension_loaded('mysqli')) {
    echo "<p>✅ MySQLi extension is loaded!</p>";
} else {
    echo "<p>❌ MySQLi extension is NOT loaded!</p>";
}

if (extension_loaded('pdo_mysql')) {
    echo "<p>✅ PDO MySQL extension is loaded!</p>";
} else {
    echo "<p>❌ PDO MySQL extension is NOT loaded!</p>";
}

// Display MySQL-related functions
echo "<h2>Available MySQL Functions:</h2>";
echo "<ul>";
if (function_exists('mysqli_connect')) {
    echo "<li>✅ mysqli_connect() - Available</li>";
} else {
    echo "<li>❌ mysqli_connect() - Not available</li>";
}

if (class_exists('PDO')) {
    echo "<li>✅ PDO class - Available</li>";
    
    // Check available PDO drivers
    echo "<li>Available PDO drivers: " . implode(', ', PDO::getAvailableDrivers()) . "</li>";
} else {
    echo "<li>❌ PDO class - Not available</li>";
}
echo "</ul>";

echo "<p><strong>PHP is ready to connect to MariaDB/MySQL!</strong></p>";
echo "<p><a href='test.php'>← Back to PHP Test</a></p>";
?>
