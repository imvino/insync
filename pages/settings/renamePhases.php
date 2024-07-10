<?php
// Start output buffering
ob_start();
$default = [
    [
        'full' => 'Northbound Left',
        'short' => 'NL',
    ],
    [
        'full' => 'Southbound Through',
        'short' => 'ST',
    ],
    [
        'full' => 'Westbound Left',
        'short' => 'WL',
    ],
    [
        'full' => 'Eastbound Through',
        'short' => 'ET',
    ],
    [
        'full' => 'Southbound Left',
        'short' => 'SL',
    ],
    [
        'full' => 'Northbound Through',
        'short' => 'NT',
    ],
    [
        'full' => 'Eastbound Left',
        'short' => 'EL',
    ],
    [
        'full' => 'Westbound Through',
        'short' => 'WT',
    ],
];
echo '<div class="my-4 mb-8">';
echo '</div>';
foreach ($default as $key => $item) {
    ?>
<div class="flex items-center space-x-4">
    <label class="mb-1 text-sm font-medium text-gray-700 dark:text-white">Phase <?php echo $key + 1 ?></label> <input
        type="text"
        class="py-2 block w-full max-w-sm border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
        placeholder="Phase Name" value="<?php echo $item['full'] ?>">
    <input type="text" value="<?php echo $item['short'] ?>"
        class="py-2 block w-full max-w-20 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
</div>
<?php
}

?>

<p class="text-gray-400 text-xs">Note: Inactive phases are not shown.</p>
<div class="flex justify-start items-center gap-x-2">
    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm
         hover:bg-lime-100 hover:text-white dark:border-neutral-700 disabled:opacity-50 disabled:pointer-events-none"
        data-hs-overlay="#hs-vertically-centered-scrollable-modal">
        Reset </button>
    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 hover:bg-white hover:text-gray-800 shadow-sm
         bg-lime-100 text-white dark:border-neutral-700 disabled:opacity-50 disabled:pointer-events-none">
        Save
    </button>
</div>
<?php
// Get the buffered output
$content = ob_get_clean();

// Include the base.php file and pass the content
include '../../base.php';

?>