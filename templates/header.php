<?php
// Default language
$defaultLang = "en";

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['lang'])) {
    // Basic validation for allowed languages
    $allowed_langs = ['en', 'hr', 'de', 'sl', 'sr'];
    if (in_array($_GET['lang'], $allowed_langs)) {
        $_SESSION['lang'] = $_GET['lang'];
    }
}

$currentLang = $_SESSION['lang'] ?? $defaultLang;

// Load language file
$langFile = __DIR__ . "/../lang/$currentLang.php";
if (!file_exists($langFile)) {
    // Fallback to default language file if current one doesn't exist
    $langFile = __DIR__ . "/../lang/$defaultLang.php";
}
$langData = include $langFile;
$lang = is_array($langData) ? $langData : [];

// Helper function for translation
function t($key) {
    global $lang;
    return $lang[$key] ?? $key;
}
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($currentLang) ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle ?? 'Agricultural Marketplace') ?></title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<header>
  <h1><?= t('Agricultural Marketplace') ?></h1>
  <p>Buy, Sell & Connect in Agriculture</p>
</header>

<nav>
  <div class="nav-links">
    <a href="/">Home</a> |
    <a href="/listings.php" ><?= t('listings') ?></a>
    <?php if (isset($_SESSION['user_id'])): ?>
      | <a href="/add_listing.php" ><?= t('add_new_listing') ?></a>
      | <a href="/logout.php" ><?= t('logout') ?> (<?= htmlspecialchars($_SESSION['username']) ?>)</a>
    <?php else: ?>
      | <a href="/login.php" ><?= t('login') ?></a>
    <?php endif; ?>
    |
    <a href="#">Contact</a>
  </div>
  <div class="language-switcher">
    <?php
        $queryParams = $_GET;
        $allowed_langs = ['en', 'hr', 'de', 'sl', 'sr'];
        $langLinks = [];
        foreach ($allowed_langs as $lang_code) {
            $queryParams['lang'] = $lang_code;
            $queryString = http_build_query($queryParams);
            $class = ($currentLang === $lang_code) ? 'class="active-lang"' : '';
            $langLinks[] = '<a href="?' . $queryString . '" ' . $class . '>' . strtoupper($lang_code) . '</a>';
        }
        echo implode(' | ', $langLinks);
    ?>
  </div>
</nav>

<div class="container">