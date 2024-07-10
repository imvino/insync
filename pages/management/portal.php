<?php
ob_start();?>
<div class="max-w-2xl">
    <div class="px-1 my-4 dark:text-white">Capitolia CA - 41st</div>
    <div class="flex flex-col bg-white dark:bg-neutral-800">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded-lg overflow-hidden dark:border-neutral-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700 font-medium">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                    41st Ave & Clares St</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                    41st Ave & Gross Rd / Hwy 1 SB Ramp</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// Get the buffered output
$content = ob_get_clean();

// Include the base.php file and pass the content
include '../../base.php';

?>