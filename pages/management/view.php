<?php
// Start output buffering
ob_start();
?>
<div x-data="{ selectedOption: 'Every second' }">
    <div class="px-1 my-4">Capitolia CA - 41st</div>
    <div class="px-1 mb-2 text-sm font-semibold">Refresh</div>
    <div class="flex justify-between items-center">
        <!-- Left-aligned dropdown -->
        <div class="hs-dropdown relative inline-flex">

            <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border
                border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50
                disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white
                dark:hover:bg-neutral-800">
                <span x-text="selectedOption"></span> <!-- Bind text to selectedOption -->
                <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </button>
            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-40 bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
                aria-labelledby="hs-dropdown-default">
                <?php
foreach (array(1, 2, 5, 30, 60) as $index) {
    $label = $index == 1 ? "Every second" : "Every $index seconds";
    echo "<a class='dropdown-item flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700'
                     href='#' @click.prevent='selectedOption=\"$label\"'>{$label}</a>";
}
?>
            </div>
        </div>
        <!-- Right-aligned buttons -->
        <div class="inline-flex rounded-lg shadow-sm">
            <button type="button"
                class="py-3 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                <i class="fa-regular fa-pause"></i>
            </button>
            <button type="button"
                class="py-3 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                <i class="fa-regular fa-arrows-rotate"></i>
            </button>
            <button type="button"
                class="py-3 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                <i class="fa-regular fa-arrows-maximize"></i>
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