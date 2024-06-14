<?php
$shortcuts = [
    "titles" => ['Multiple Cameras View', 'Daily Summary', 'History Viewer', 'Invalid Logins'],
    "links" => ["cameraViewMulti.php", "dailySummary.php", "history.php", "invalidLogins.php"],
    "icons" => ['<i class="fa-solid fa-grid-horizontal"></i>', '<i class="fa-solid fa-file-chart-column"></i>',
        '<i class="fa-solid fa-list-timeline"></i>', '<i class="fa-solid fa-arrow-right-to-arc"></i>'],
];
// Start output buffering
ob_start();
?>
<!-- Icon Blocks -->
<div class="flex items-center justify-center h-screen" style=" height: calc(100vh - 150px)">
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 items-center gap-6 md:gap-10">
        <?php foreach ($shortcuts['titles'] as $index => $titles) {?>
        <a href="/<?php echo $shortcuts['links'][$index]; ?>"
            class="size-full bg-white shadow-lg rounded-lg p-5 dark:bg-neutral-900">
            <div class="flex text-gray-400 text-5xl justify-center items-center w-[62px] h-[62px]">
                <?php echo $shortcuts['icons'][$index]; ?>
            </div>
            <p class="text-gray-600 text-center dark:text-neutral-400"><?php echo $titles ?></p>
        </a>
        <?php }?>
    </div>
</div>
<!-- End Icon Blocks -->
<?php
// Get the buffered output
$content = ob_get_clean();

// Include the base.php file and pass the content
include 'base.php';

?>