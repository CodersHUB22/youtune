<?php
// Logic to generate the footer HTML dynamically
header('Content-Type: application/json');

$footerHTML = '
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; ' . htmlspecialchars(date('Y'), ENT_QUOTES, 'UTF-8') . ' YouTune. All rights reserved.</p>
    </footer>
';

echo json_encode(['footerHTML' => $footerHTML]);
?>