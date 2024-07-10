<?php
// Start output buffering
ob_start();
?>

<div class="flex items-center my-4 mb-8">
    <?php include '../../components/daterange.php';?>
    <div class="flex items-center mt-5 mx-5">
        <input type="checkbox"
            class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
            id="hs-default-checkbox">
        <label for="hs-default-checkbox" class="text-sm text-gray-800 ms-3 font-medium dark:text-white">Load only Active
            Notifications</label>
    </div>

    <button type="button" class="mt-6 ml-4 py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 hover:bg-white hover:text-gray-800 shadow-sm
         bg-lime-100 text-white dark:border-neutral-700 disabled:opacity-50 disabled:pointer-events-none">
        Load
    </button>
    <button type="button"
        class="mt-6 ml-2 py-2.5 px-3 rounded-lg border border-lime-100 text-lime-100 hover:border-lime-100 hover:text-lime-100 disabled:opacity-50 disabled:pointer-events-none">
        <i class="fa-regular fa-arrow-down-to-bracket"></i>
    </button>
</div>
<div class="mb-8">
    <div class="flex flex-col bg-white dark:bg-neutral-900">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded-lg overflow-hidden dark:border-neutral-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="bg-gray-50 dark:bg-neutral-800">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">
                                    TIME</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">
                                    ITEM</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">
                                    MESSAGE</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700 font-medium">
                            <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                    2024-05-05 01:29:54</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                    Network connectivity has been lost to some of the other intersections in this
                                    group.
                                    Intersection/s: 192.168.62.1
                                </td>
                            </tr>
                            <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                    2024-05-05 01:29:54</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                    Network connectivity has been lost to some of the other intersections in this
                                    group.
                                    Intersection/s: 192.168.62.1
                                </td>
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