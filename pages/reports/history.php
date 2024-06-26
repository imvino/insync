<?php
// Start output buffering
ob_start();
$phases = array("PHASE 1 (NL)", "PHASE 2 (ST)", "PHASE 3 (SL)", "PHASE 4 (WL)", "PHASE 5 (ET)");
?>

<?php include '../../components/daterange.php';?>
<?php include '../../components/tags.php';?>

<div class="flex flex-col bg-white">
    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="border rounded-lg overflow-hidden dark:border-neutral-700">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    <thead class="bg-gray-50 dark:bg-neutral-700">
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