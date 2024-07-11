<?php
// Start output buffering
ob_start();
$tabCss = "py-2 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200
hover:bg-white hover:text-gray-800 shadow-sm bg-lime-600 text-white disabled:opacity-50 disabled:pointer-events-none";
?>
<div>
    <div class="px-1 my-4 text-sm font-medium text-gray-700 dark:text-white">NTP Server IP:<span
            class="text-gray-400 text-sm pl-2">216.239.35.0</span></div>
    <div class="px-1 mb-2 text-sm font-semibold text-gray-700 dark:text-white">Server IP Address</div>
    <div class="flex justify-start items-center">
        <input type="text"
            class="py-2 block w-full max-w-[15rem] border-gray-200 rounded-lg text-sm dark:bg-neutral-500 dark:text-white dark:border-neutral-700 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
            placeholder="Enter IP">
        <div class="inline-flex rounded-lg shadow-sm ml-2">
            <button type="button" class="<?php echo $tabCss ?>">
                Test
            </button>
            <button type="button" class="<?php echo $tabCss ?>">
                Sync
            </button>
            <button type="button" class="<?php echo $tabCss ?>">
                Save
            </button>
        </div>
    </div>
</div>

<?php
// Get the buffered output
$content = ob_get_clean();

// Include the base.php file and pass the content
include '../../base.php';

?>