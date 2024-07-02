<?php // Start output buffering ob_start(); ?>
<div class="flex items-end">
    <div class="flex flex-col">
        <label class="mb-1 text-sm font-medium text-gray-700">Mail to</label>
        <input type="text" id="Latitude"
            class="py-2 block w-full max-w-[15rem] border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
            placeholder="Latitude">
    </div>
    <div class="flex flex-col ml-2">
        <label class="mb-1 text-sm font-medium text-gray-700">Mail from</label>
        <input type="text" id="Longitude"
            class="py-2 block w-full max-w-[15rem] border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
            placeholder="Longitude">
    </div>
</div>
<div class="flex items-end">
    <div class="flex flex-col">
        <label class="mb-1 text-sm font-medium text-gray-700">SMTP Server</label>
        <input type="text" id="Latitude"
            class="py-2 block w-full max-w-[15rem] border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
            placeholder="Latitude">
    </div>
    <div class="flex flex-col ml-2">
        <label class="mb-1 text-sm font-medium text-gray-700">SMTP Port</label>
        <input type="text" id="Longitude"
            class="py-2 block w-full max-w-[15rem] border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
            placeholder="Longitude">
    </div>
</div>
<div class="flex items-end">
    <div>
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white
                    text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
            Rest </button>
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border
                    bg-lime-600 text-white disabled:opacity-50 disabled:pointer-events-none">
            Send Email
        </button>
    </div>
</div>

<?php
// Get the buffered output
$content = ob_get_clean();

// Include the base.php file and pass the content
include '../../base.php';

?>