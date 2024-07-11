<?php
// Start output buffering
ob_start();
$cssClass = array(
    'tooltip' => "hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 tooltip text-xs font-medium text-white rounded shadow-sm",
);

function toolTip($help)
{?>
<div class="px-2 text-gray-600 dark:text-white hs-tooltip [--placement:right] inline-block">
    <i class="fa-light fa-circle-info"></i>
    <span class="<?php echo $GLOBALS['cssClass']['tooltip'] ?>" role="tooltip">
        <div class="helpBox">
            <ul><?php foreach ($help as $key => $value) {echo "<li>$value</li>";}?>
            </ul>
        </div>
    </span>
</div>
<?php }
function checkboxList($title, $help, $css = '')
{
    $id = str_replace(' ', '_', strtolower($title));
    ?>
<div class="flex items-center">
    <label for="<?php echo $id ?>" class="dark:text-white <?php echo $css ?>"><?php echo $title ?></label>
    <input type="checkbox"
        class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
        id="<?php echo $id ?>">
    <?php echo toolTip($help); ?>
</div>
<?php
}
function dropdown($id, $options, $selected, $css = '')
{
    ?>
<div class="hs-dropdown relative inline-flex" x-data="{ selectedOption_<?php echo $id ?>: '<?php echo $selected ?>' }">
    <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border
        border-gray-200 bg-white dark:bg-neutral-500 dark:text-white dark:border-neutral-700 text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50
        disabled:pointer-events-none <?php echo $css ? $css : 'min-w-48' ?>">
        <span x-text="selectedOption_<?php echo $id ?>"></span> <!-- Bind text to selectedOption -->
        <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="m6 9 6 6 6-6" />
        </svg>
    </button>
    <div class="hs-dropdown-menu  z-[80] transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-40 bg-white shadow-md rounded-lg p-2 mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
        aria-labelledby="hs-dropdown-default">
        <?php
foreach ($options as $index) {
        echo "<a class='dropdown-item flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100'
             href='#' @click.prevent='selectedOption_$id=\"$index\"'>{$index}</a>";
    }
    ?>
    </div>
</div>
<?php
}

function inputBox($params)
{
    // Set default values
    $defaults = [
        'placeholder' => '',
        'title' => '',
        'tip' => '',
        'value' => '',
        'maxWidth' => '15rem',
    ];

    // Merge provided params with defaults
    $params = array_merge($defaults, $params);

    $id = str_replace(' ', '_', strtolower($params['title']));
    ?>

<label for="<?php echo $id ?>"
    class="mb-1 text-sm font-medium text-gray-700 dark:text-white"><?php echo $params['title'] ?>
    <?php echo $params['tip'] ? toolTip($params['tip']) : '' ?></label>
<input type="text" id="<?php echo $id ?>"
    class="py-2 block w-full max-w-[15rem] border-gray-200 rounded-lg text-sm dark:bg-neutral-500 dark:text-white dark:border-neutral-700 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
    <?php echo $params['placeholder'] ? "placeholder=\"{$params['placeholder']}\"" : '' ?>
    <?php echo $params['value'] ? "value=\"{$params['value']}\"" : '' ?>>
<?php
}

return [
    'toolTip' => 'toolTip',
    'checkboxList' => 'checkboxList',
    'dropdown' => 'dropdown',
    'inputBox' => 'inputBox',
];

?>