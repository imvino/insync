<?php
extract(require_once '../../utils/tools.php');
ob_start();

?>
<div class="my-4 mb-8">
    <div class="flex items-end">
        <div class="flex flex-col"> <?php echo inputBox(['placeholder' => 'Latitude', 'title' => 'Latitude']); ?></div>
        <div class="flex flex-col ml-2"> <?php echo inputBox(['placeholder' => 'Longitude', 'title' => 'Longitude']); ?>
        </div>

        <div class="ml-4">
            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm
         hover:bg-lime-100 hover:text-white dark:border-neutral-700 disabled:opacity-50 disabled:pointer-events-none">
                cancel </button>
            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 hover:bg-white hover:text-gray-800 shadow-sm
         bg-lime-100 text-white dark:border-neutral-700 disabled:opacity-50 disabled:pointer-events-none">
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