<?php
// Diagnostic file - temporary. Remove after debugging.
header('Content-Type: text/plain; charset=utf-8');
echo "--- Server variables ---\n";
echo 'REQUEST_URI: ' . ($_SERVER['REQUEST_URI'] ?? '') . "\n";
echo 'SCRIPT_NAME: ' . ($_SERVER['SCRIPT_NAME'] ?? '') . "\n";
echo 'DOCUMENT_ROOT: ' . ($_SERVER['DOCUMENT_ROOT'] ?? '') . "\n";
echo "\n";

echo "--- App directory listing ---\n";
$appDir = __DIR__ . '/App';
if (is_dir($appDir)) {
    foreach (scandir($appDir) as $f) {
        if ($f === '.' || $f === '..') continue;
        $path = $appDir . '/' . $f;
        echo ($f) . (is_dir($path) ? "\t<DIR>\n" : "\tFILE\n");
    }
} else {
    echo "App directory not found: $appDir\n";
}

echo "\n--- App/Controllers listing ---\n";
$ctrlDir = $appDir . '/Controllers';
if (is_dir($ctrlDir)) {
    foreach (scandir($ctrlDir) as $f) {
        if ($f === '.' || $f === '..') continue;
        $path = $ctrlDir . '/' . $f;
        echo ($f) . (is_dir($path) ? "\t<DIR>\n" : "\tFILE\n");
    }
} else {
    echo "Controllers directory not found: $ctrlDir\n";
}

echo "\n--- router.php (first 4000 chars) ---\n";
$routerPath = $appDir . '/router.php';
if (!file_exists($routerPath)) {
    // also check Controllers case-insensitive variants
    $routerPathLower = $appDir . '/controllers/router.php';
    if (file_exists($routerPathLower)) $routerPath = $routerPathLower;
}
if (file_exists($routerPath)) {
    echo substr(file_get_contents($routerPath), 0, 4000) . "\n";
} else {
    echo "router.php not found at $routerPath\n";
}

echo "\n--- config.php (first 1000 chars) ---\n";
$configPath = $appDir . '/config.php';
if (file_exists($configPath)) {
    echo substr(file_get_contents($configPath), 0, 1000) . "\n";
} else {
    echo "config.php not found at $configPath\n";
}

echo "\n--- End diagnostic ---\n";
?>
