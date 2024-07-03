<?php
function isActive($subLinks, $currentUrl)
{
    foreach ($subLinks as $subLink) {
        if (basename($currentUrl) === $subLink) {
            return true;
        }
    }
    return false;
}
$currentUrl = basename($_SERVER['REQUEST_URI']);
?>
<div id="application-sidebar" class="hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300
    transform hidden fixed top-0 start-0 bottom-0 z-[60] w-68 bg-white border-e border-gray-200 overflow-y-auto
    lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full
    [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700
    dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-800 dark:border-neutral-700" style="top:54px">

    <nav class="hs-accordion-group p-6 w-full h-full flex flex-col" data-hs-accordion-always-open>

        <!-- Accordion Items Container -->
        <ul class="flex-grow space-y-1.5">
            <?php foreach ($menu as $item) {
    $isActiveAccordion = isActive($item['subLinks'], $currentUrl) ? 'active' : '';
    ?>
            <li class="hs-accordion <?php echo $isActiveAccordion; ?>" id="users-accordion">
                <button type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5
                 hs-accordion-active:text-lime-600 hs-accordion-active:hover:bg-transparent text-sm text-neutral-700 rounded-lg
                 hover:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300
                 dark:hs-accordion-active:text-white">
                    <?php echo $item['icon'] ?>
                    <?php echo $item['title'] ?>
                    <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="m18 15-6-6-6 6" />
                    </svg>
                    <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6" />
                    </svg>
                </button>
                <div id="users-accordion-child"
                    class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden"
                    style="<?php echo $isActiveAccordion ? 'display:block' : '' ?>">
                    <ul class="hs-accordion-group pt-2" data-hs-accordion-always-open>
                        <?php foreach ($item['submenu'] as $index => $submenuTitle) {
        $requestUriParts = explode('/', $_SERVER['REQUEST_URI']);
        $lastSegment = end($requestUriParts);

        $isActive = ($lastSegment == $item['subLinks'][$index]) ? 'text-white bg-lime-600 dark:bg-neutral-700 dark:text-neutral-300' : '';
        echo $submenuTitle == 'View Designer' || $submenuTitle == 'Maintenance' ? '<hr/>' : ''
        ?>
                        <li class="hs-accordion my-1" id="users-accordion-sub-1">
                            <a href="<?php echo "/" . $item['mainLink'] . "/" . $item['subLinks'][$index] ?>"
                                class="ps-8 hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5
                                hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent text-sm text-neutral-700
                                hover:text-white rounded-lg hover:bg-lime-100 dark:bg-neutral-800 dark:hover:bg-neutral-700
                                dark:text-neutral-400 dark:hover:text-neutral-300 dark:hs-accordion-active:text-white <?php echo $isActive; ?>">
                                <?php echo $submenuTitle ?>
                            </a>
                        </li>
                        <?php
}?>
                    </ul>
                </div>
            </li>
            <?php
}?>
        </ul>

        <!-- Help Button at the Bottom -->
        <div class="mt-auto">
            <a href="/help"
                class="w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-neutral-700
                rounded-lg hover:bg-lime-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-400 hover:text-white">
                <i class="fa-solid fa-square-question" aria-hidden="true"></i>
                Help
            </a>
        </div>
    </nav>
</div>