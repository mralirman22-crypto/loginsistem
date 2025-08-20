<?php
include 'config.php';

// Hapus semua data session
session_unset();
session_destroy();

// Redirect ke halaman login
header('Location: login.php');
exit;
?>