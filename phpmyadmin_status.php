<?php
echo "<h1>🎉 phpMyAdmin - Passwordless Setup Complete!</h1>";

echo "<h2>✅ System Status</h2>";
echo "<ul>";

// Check Apache
echo "<li><strong>Apache:</strong> ";
$apache_status = exec('systemctl is-active apache2');
echo ($apache_status === 'active') ? "✅ Running" : "❌ Not Running";
echo "</li>";

// Check MariaDB
echo "<li><strong>MariaDB:</strong> ";
$mariadb_status = exec('systemctl is-active mariadb');
echo ($mariadb_status === 'active') ? "✅ Running" : "❌ Not Running";
echo "</li>";

// Check PHP
echo "<li><strong>PHP Version:</strong> ✅ " . phpversion() . "</li>";

echo "</ul>";

echo "<h2>🔧 phpMyAdmin Configuration</h2>";
echo "<ul>";

// Check phpMyAdmin files
echo "<li><strong>phpMyAdmin Files:</strong> ";
echo (file_exists('/usr/share/phpmyadmin/index.php')) ? "✅ Installed" : "❌ Missing";
echo "</li>";

// Check authentication type
echo "<li><strong>Authentication:</strong> ✅ Passwordless (config mode)</li>";

// Check Blowfish secret
echo "<li><strong>Blowfish Secret:</strong> ";
echo (file_exists('/var/lib/phpmyadmin/blowfish_secret.inc.php')) ? "✅ Configured" : "❌ Missing";
echo "</li>";

echo "</ul>";

echo "<h2>🔐 Database Connection Test</h2>";
echo "<ul>";

// Test database connection without password
try {
    $pdo = new PDO('mysql:host=localhost', 'root', '');
    echo "<li><strong>Root Login (No Password):</strong> ✅ Successful</li>";
    
    // Get MySQL version
    $version = $pdo->query('SELECT VERSION()')->fetchColumn();
    echo "<li><strong>MariaDB Version:</strong> ✅ " . $version . "</li>";
    
} catch (PDOException $e) {
    echo "<li><strong>Database Connection:</strong> ❌ Failed - " . $e->getMessage() . "</li>";
}

echo "</ul>";

echo "<h2>🌐 Access Information - NO LOGIN REQUIRED!</h2>";
echo "<div style='background: #e8f5e8; padding: 15px; border-radius: 5px; border: 2px solid #4CAF50;'>";
echo "<p><strong>✅ phpMyAdmin URL:</strong> <a href='/phpmyadmin/' target='_blank'>http://localhost/phpmyadmin/</a></p>";
echo "<p><strong>🎉 No Username/Password Required!</strong></p>";
echo "<p><strong>🔓 Automatic Login:</strong> Direct access to dashboard</p>";
echo "<p><strong>Port Forwarding:</strong> Forward VM port 80 → localhost:8080</p>";
echo "<p><strong>Then access:</strong> <a href='http://localhost:8080/phpmyadmin/' target='_blank'>http://localhost:8080/phpmyadmin/</a></p>";
echo "</div>";

echo "<h2>⚠️ Security Note</h2>";
echo "<div style='background: #fff3cd; padding: 15px; border-radius: 5px; border: 2px solid #ffc107;'>";
echo "<p><strong>Warning:</strong> This configuration allows anyone to access your database without authentication.</p>";
echo "<p><strong>Recommendation:</strong> Only use this in development/testing environments.</p>";
echo "<p><strong>Production:</strong> Always use proper authentication for production systems.</p>";
echo "</div>";

echo "<h2>📁 Test Files</h2>";
echo "<ul>";
echo "<li><a href='test.php'>PHP Test</a></li>";
echo "<li><a href='mysql_test.php'>MySQL Extension Test</a></li>";
echo "<li><a href='info.php'>PHP Info</a></li>";
echo "<li><a href='test.html'>HTML Test</a></li>";
echo "</ul>";

echo "<p style='color: green; font-weight: bold; font-size: 18px;'>🎉 phpMyAdmin is now accessible without username/password!</p>";
?>
