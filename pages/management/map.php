<?php
// Start output buffering
ob_start();
?>

<div class="dark:text-white">Map page content.</div>

<?php
// Get the buffered output
$content = ob_get_clean();

// Include the base.php file and pass the content
include '../../base.php';

?>