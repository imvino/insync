<?php
// Start output buffering
ob_start();
include '../../components/tags.php';
$phases = array("PHASE 1 (NL)", "PHASE 2 (ST)", "PHASE 3 (SL)", "PHASE 4 (WL)", "PHASE 5 (ET)");
$includeMenu = [
    [
        'title' => 'GENERAL MOVEMENTS',
        'items' => ['Phase Volumes', 'Pedestrians'],
    ],
    [
        'title' => 'RESULTS',
        'items' => ['Errors', 'Successes', 'Tunnels'],
    ],
    [
        'title' => 'PERIODS',
        'items' => ['Period Changes'],
    ],
];

$movements = [
    [
        'title' => 'Movements',
        'items' => ['Southbound Through', 'Southbound Left',
            'Northbound Through', 'Northbound Left',
            'Westbound Through', 'Westbound Left',
            'Eastbound Through', 'Eastbound Left'],
    ]];

function inputNumbers($title)
{
    echo $ele = <<<HTML
    <div class="flex flex-col  max-w-[200px]">
     <label class="mb-1 text-sm font-medium text-gray-700 dark:text-white">$title <span class="text-gray-400 text-xs"> wait times over/sec</span></label>
<div class="bg-white dark:bg-neutral-500 border border-gray-200 dark:border-neutral-700 rounded-lg shadow-sm"
    data-hs-input-number="">
    <div class="w-full flex justify-between items-center gap-x-1">
        <div class="grow py-1 px-3">
            <input class="w-full p-0 bg-transparent border-0 text-gray-800 dark:text-white focus:ring-0" type="number"
                value="1" data-hs-input-number-input="">
        </div>
        <div class="flex items-center -gap-y-px divide-x divide-gray-200 dark:divide-neutral-700 border-s border-gray-200 dark:border-neutral-700">
            <button type="button" style="height: 32px"
                class="size-10 inline-flex justify-center items-center gap-x-2 text-sm  dark:text-white font-medium last:rounded-e-lg bg-white
                dark:bg-neutral-500 dark:hover:bg-neutral-800 text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                data-hs-input-number-decrement="">
                <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                </svg>
            </button>
            <button type="button" style="height: 32px"
                class="size-10 inline-flex justify-center items-center gap-x-2 text-sm  dark:text-white font-medium last:rounded-e-lg bg-white
                dark:bg-neutral-500 dark:hover:bg-neutral-800 text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                data-hs-input-number-increment="">
                <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M5 12h14"></path>
                    <path d="M12 5v14"></path>
                </svg>
            </button>
        </div>
        </div>
    </div>
</div>
HTML;
}
?>

<div class="flex flex-wrap">
    <?php include '../../components/daterange.php';?>
    <div class=" pl-3"></div><?php echo inputTags('Include', $includeMenu) ?>
    <div class=" pl-3"><?php echo inputTags('Limit to Movements Including', $movements) ?></div>

</div>
<div class="flex flex-wrap items-center" style="margin-top:0px">
    <div><?php echo inputNumbers('Highlight') ?></div>
    <div class=" pl-3"><?php echo inputNumbers('Only Show') ?></div>
    <button type="button"
        class="mt-6 ml-4 py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 hover:bg-white hover:text-gray-800 dark:border-neutral-700 shadow-sm bg-lime-100 text-white disabled:opacity-50 disabled:pointer-events-none">
        Load
    </button>
    <button type="button" class="mt-6 ml-2 py-2.5 px-3 inline-flex items-center gap-x-2 text-sm
        font-semibold rounded-lg border border-lime-100 text-lime-100
        disabled:opacity-50 disabled:pointer-events-none">
        <i class="fa-regular fa-arrow-down-to-bracket"></i>
    </button>
</div>

<div class="flex flex-col bg-white dark:bg-neutral-900">
    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="border rounded-lg overflow-hidden dark:border-neutral-700">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    <thead class="bg-gray-50 dark:bg-neutral-800">
                        <tr>
                            <th rowspan="2"
                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">
                                TIME</th>
                            <th rowspan="2"
                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">
                                DURATION</th>
                            <th rowspan="2"
                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">
                                MOVEMENT</th>
                            <?php foreach ($phases as $phase): ?>
                            <th colspan="2"
                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">
                                <?php echo $phase; ?>
                            </th>
                            <?php endforeach;?>
                            <th rowspan="2"
                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">
                                PERIOD</th>
                        </tr>
                        <tr>
                            <?php foreach ($phases as $phase): ?>
                            <th
                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">
                                Q</th>
                            <th
                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">
                                W</th>
                            <?php endforeach;?>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700 font-medium">
                        <?php for ($i = 0; $i < 4; $i++): // Assuming 4 rows for demonstration ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                12:00:17 AM
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                4
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                Movement <?php echo $i + 1; ?>
                            </td>
                            <?php foreach ($phases as $phase): ?>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                0
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                0
                            </td>
                            <?php endforeach;?>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                90
                            </td>
                        </tr>
                        <?php endfor;?>
                    </tbody>
                </table>
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