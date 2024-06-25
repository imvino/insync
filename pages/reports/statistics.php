<?php
// Start output buffering
ob_start();
?>

<?php include '../../components/daterange.php'?>

<?php
// Get the buffered output
$content = ob_get_clean();

// Include the base.php file and pass the content
include '../../base.php';

?>