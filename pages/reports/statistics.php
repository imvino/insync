<?php
// Start output buffering
ob_start();
$tabs = array("Vehicle Graphs", "Phase Volume Playback", "Splits", "Pedestrian Graphs", "Period Graph", "Count Totals", "Processor Graphs");

$countTotal = <<<HTML
<div class="flex flex-col max-w-md bg-white dark:bg-neutral-900">
    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="border rounded-lg overflow-hidden dark:border-neutral-700">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    <thead class="bg-gray-50 dark:bg-neutral-800">
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
<div>
    <div class="flex items-center my-4 mb-8">
        <?php include '../../components/daterange.php';?>
        <button type="button" class="mt-6 ml-4 py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 hover:bg-white hover:text-gray-800 shadow-sm
         bg-lime-100 text-white dark:border-neutral-700 disabled:opacity-50 disabled:pointer-events-none">
            Load
        </button>
        <button type="button"
            class="mt-6 ml-2 py-2.5 px-3 rounded-lg border border-lime-100 text-lime-100 hover:border-lime-100 hover:text-lime-100 disabled:opacity-50 disabled:pointer-events-none">
            <i class="fa-regular fa-arrow-down-to-bracket"></i>
        </button>
    </div>

    <div class="w-full bg-white rounded-lg border shadow-md dark:bg-neutral-900">
        <div class="border-b border-gray-200 px-4 dark:border-neutral-700">
            <nav class="flex space-x-2" aria-label="Tabs" role="tablist">
                <?php foreach ($tabs as $index => $tab): ?>
                <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-lime-100 hs-tab-active:text-lime-100 py-4 px-1 inline-flex items-center gap-x-2
                border-b-2 border-transparent dark:text-white text-sm whitespace-nowrap text-gray-800 hover:text-lime-100 disabled:opacity-50 disabled:pointer-events-none
                 dark:text-neutral-400 dark:hover:text-lime-100 <?php echo $index === 0 ? 'active' : ''; ?>"
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

                <?php
if (strtolower($tab) == "count totals") {
    echo $countTotal;
} else {
    echo '<p class="text-gray-500 dark:text-neutral-400">
    <em class="font-semibold text-gray-800 dark:text-neutral-200">' . strtolower($tab) . '</em> tab body. </p>';

    include '../../components/chart.php';
}
?>

            </div>
            <?php endforeach;?>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('[role="tabpanel"]');
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const chartContainer = tab.querySelector('[id^="chart-container-"]');
                    if (chartContainer) {
                        const containerId = '#' + chartContainer.id;
                        buildAndRenderChart(containerId);
                    }
                });
            });
        });
        </script>

    </div>
</div>
<?php
// Get the buffered output
$content = ob_get_clean();

// Include the base.php file and pass the content
include '../../base.php';
?>