<?php
// Start output buffering
ob_start();
?>
<div class="my-4 mb-8"> <button type="button" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 hover:bg-white hover:text-gray-800 shadow-sm
         bg-lime-100 text-white dark:border-neutral-700 disabled:opacity-50 disabled:pointer-events-none">
        Launch Configuration Utility
    </button>
</div>
<?php
// Get the buffered output
$content = ob_get_clean();

// Include the base.php file and pass the content
include '../../base.php';

?>