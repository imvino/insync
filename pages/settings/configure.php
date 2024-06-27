<?php
// Start output buffering
ob_start();
?>
<button type="button" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm
    hover:bg-lime-100 hover:text-white disabled:opacity-50 disabled:pointer-events-none">
    Launch Configuration Utility
</button>
<?php
// Get the buffered output
$content = ob_get_clean();

// Include the base.php file and pass the content
include '../../base.php';

?>