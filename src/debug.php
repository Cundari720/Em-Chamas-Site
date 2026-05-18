<?php
echo "<pre>";
echo "=== _SERVER ===\n";
foreach ($_SERVER as $key => $value) {
    if (str_contains($key, 'MYSQL')) {
        echo "$key = $value\n";
    }
}

echo "\n=== _ENV ===\n";
foreach ($_ENV as $key => $value) {
    if (str_contains($key, 'MYSQL')) {
        echo "$key = $value\n";
    }
}

echo "\n=== getenv ===\n";
$vars = ['MYSQLHOST', 'MYSQLPORT', 'MYSQLUSER', 'MYSQLPASSWORD', 'MYSQLDATABASE'];
foreach ($vars as $var) {
    echo "$var = " . getenv($var) . "\n";
}
echo "</pre>";
?>