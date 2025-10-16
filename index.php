<?php
require_once __DIR__ . '/config.php';
// Simple router based on query param 'page'
$page = $_GET['page'] ?? 'home';
$allowed = ['home','shop','product','cart','checkout','about','contact','services','blog','login','register','dashboard','admin'];
if (!in_array($page, $allowed)) $page = 'home';

include __DIR__ . '/partials/header.php';
include __DIR__ . '/pages/' . $page . '.php';
include __DIR__ . '/partials/footer.php';
?>