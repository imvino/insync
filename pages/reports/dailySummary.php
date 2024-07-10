<?php
// Start output buffering
ob_start();
?>
<div class="max-w-2xl">
    <div class="my-4 mb-8">
        <div class="text-sm font-medium text-gray-700 dark:text-white">Start Date</div>
        <div class="flex items-center space-x-4">
            <div class="w-52">
                <?php include '../../components/datepicker.php'?>
            </div>
            <button type="button"
                class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200  shadow-sm
    bg-lime-100 text-white hover:bg-white hover:text-gray-800 dark:border-neutral-700 disabled:opacity-50 disabled:pointer-events-none">
                Load
            </button>
        </div>
    </div>

    <div class="mb-8">
        <div class="mb-1 text-sm font-medium text-gray-700 dark:text-white">Intersection Totals</div>
        <div class="flex flex-col bg-white dark:bg-neutral-900">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="border rounded-lg overflow-hidden dark:border-neutral-700">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-50 dark:bg-neutral-800">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">
                                        PHASE</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">
                                        TOTAL VEHICLES</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">
                                        TOTAL PEDESTRIANS</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700 font-medium">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        Phase 1</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        513
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        Phase 2</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        54
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        345</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-8">
        <div class="mb-1 text-sm font-medium text-gray-700 dark:text-white">Vehicles Counts</div>
    </div>
    <?php
// Get the buffered output
$content = ob_get_clean();

// Include the base.php file and pass the content
include '../../base.php';

?>