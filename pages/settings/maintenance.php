<?php
// Start output buffering
ob_start();

$tabCss = "py-2 px-4 inline-flex hover:bg-lime-100 hover:text-white items-center gap-x-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none";

?>
<div class="flex items-center space-x-4">
    <label class="text-sm font-semibold dark:text-white">Restore Configuration</label>
    <div class="flex justify-start items-center">
        <div class="inline-flex rounded-lg shadow-sm ml-2">
            <button type="button" class="<?php echo $tabCss ?>">
                In|Sync Auto-Saves
            </button>
            <button type="button" class="<?php echo $tabCss ?>">
                Upload
            </button>
        </div>
    </div>
</div>
<div class="flex items-center space-x-4">
    <label class="text-sm font-semibold dark:text-white">Save Archive</label>
    <div class="flex justify-start items-center">
        <div class="inline-flex rounded-lg shadow-sm ml-2">
            <button type="button" class="<?php echo $tabCss ?>">
                Download
            </button>
        </div>
        <div class="flex ml-3 ">
            <input type="checkbox"
                class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 disabled:opacity-50 disabled:pointer-events-none"
                id="hs-default-checkbox">
            <label for="hs-default-checkbox"
                class="ml-2 block text-sm text-gray-800 font-medium min-w-[155px] dark:text-white">Include
                Static
                Files</label>
        </div>
    </div>
</div>
<div class="flex items-center space-x-4">
    <label class="text-sm font-semibold dark:text-white">Application Deployment</label>
    <div class="flex justify-start items-center">
        <div class="inline-flex rounded-lg shadow-sm ml-2">
            <button type="button" class="<?php echo $tabCss ?>">
                Update Software
            </button>
        </div>
    </div>
</div>
<div class="flex items-center space-x-4">
    <label class="text-sm font-semibold dark:text-white">Processor Management</label>
    <div class="flex justify-start items-center">
        <div class="inline-flex rounded-lg shadow-sm ml-2">
            <button type="button" class="<?php echo $tabCss ?>">
                Restart Kiosk
            </button>
            <button type="button" class="<?php echo $tabCss ?>">
                Restart Processor
            </button>
            <button type="button" class="<?php echo $tabCss ?>">
                Clear History
            </button>
        </div>
    </div>
</div>
<div class="flex items-center space-x-4">
    <label class="text-sm font-semibold dark:text-white">Network Utilities</label>
    <div class="flex justify-start items-center">
        <div class="inline-flex rounded-lg shadow-sm ml-2">
            <button type="button" class="<?php echo $tabCss ?>">
                Ping/Arp Prompt
            </button>
        </div>
    </div>
</div>
<div class="flex items-center space-x-4">
    <label class="text-sm font-semibold dark:text-white">Remote Desktop Access</label>
    <div class="flex justify-start items-center">
        <div class="relative inline-block">
            <input type="checkbox" id="hs-default-switch-with-icons" class="peer relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors
                ease-in-out duration-200 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-lime-100
                checked:border-lime-100 focus:checked:border-lime-100 before:inline-block before:size-6 before:bg-white
                checked:before:bg-white before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow
                before:transform before:ring-0 before:transition before:ease-in-out before:duration-200">
            <label for="hs-default-switch-with-icons" class="sr-only">switch</label>
            <span class="peer-checked:text-white text-gray-500 size-6 absolute top-0.5 start-0.5 flex justify-center items-center pointer-events-none transition-colors ease-in-out duration-200
              ">
                <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </span>
            <span
                class="peer-checked:text-lime-600 text-gray-500 size-6 absolute top-0.5 end-0.5 flex justify-center items-center pointer-events-none transition-colors ease-in-out duration-200">
                <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                    stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
            </span>
        </div>
    </div>
</div>




<?php
// Get the buffered output
$content = ob_get_clean();

// Include the base.php file and pass the content
include '../../base.php';

?>