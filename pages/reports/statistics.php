<?php
// Start output buffering
ob_start();
$tabs = array("Vehicle Graphs", "Phase Volume Playback", "Splits", "Pedestrian Graphs", "Period Graph", "Count Totals", "Processor Graphs");

$countTotal = <<<HTML
<div class="flex flex-col max-w-md bg-white">
    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="border rounded-lg overflow-hidden dark:border-neutral-700">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    <thead class="bg-gray-50 dark:bg-neutral-700">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">PHASE</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">VEHICLES</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">PEDESTRIANS</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700 font-medium">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">Phase 1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">513</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200"></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">Phase 2</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">54</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">345</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
HTML;
?>

<div class="flex items-center">
    <?php include '../../components/daterange.php';?>
    <!-- <div class="mt-5"> -->
    <button type="button"
        class="mt-6 ml-4 py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-lime-100 hover:text-white disabled:opacity-50 disabled:pointer-events-none">
        Load
    </button>
    <button type="button"
        class="mt-6 ml-2 py-2.5 px-3 rounded-lg border border-lime-100 text-lime-100 hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none">
        <i class="fa-regular fa-arrow-down-to-bracket"></i>
    </button>
    <!-- </div> -->

</div>

<div class="w-full bg-white rounded-lg shadow-md dark:bg-neutral-800">
    <div class="border-b border-gray-200 px-4 dark:border-neutral-700">
        <nav class="flex space-x-2" aria-label="Tabs" role="tablist">
            <?php foreach ($tabs as $index => $tab): ?>
            <button type="button"
                class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500 <?php echo $index === 0 ? 'active' : ''; ?>"
                id="basic-tabs-item-<?php echo $index + 1; ?>" data-hs-tab="#basic-tabs-<?php echo $index + 1; ?>"
                aria-controls="basic-tabs-<?php echo $index + 1; ?>" role="tab">
                <?php echo $tab; ?>
            </button>
            <?php endforeach;?>
        </nav>
    </div>

    <div class="mt-3 p-4">
        <?php foreach ($tabs as $index => $tab): ?>
        <div id="basic-tabs-<?php echo $index + 1; ?>" role="tabpanel"
            aria-labelledby="basic-tabs-item-<?php echo $index + 1; ?>"
            class="<?php echo $index === 0 ? '' : 'hidden'; ?>">
            <p class="text-gray-500 dark:text-neutral-400">
                This is the <em
                    class="font-semibold text-gray-800 dark:text-neutral-200"><?php echo strtolower($tab); ?></em> tab
                body.
                <?php
if (strtolower($tab) == "count totals") {
    echo $countTotal;
}
?>
            </p>
        </div>
        <?php endforeach;?>
    </div>
</div>

<?php
// Get the buffered output
$content = ob_get_clean();

// Include the base.php file and pass the content
include '../../base.php';
?>