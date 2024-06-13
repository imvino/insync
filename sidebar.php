<?php
$menu = [
    [
        "title" => "Management Group",
        "subLinks" => ["portal.php", "corridorViewer.php", "map/index.php", "corridorStatusNew.php"],
        "submenu" => ["Portal", "Management Group View", "Map", "Status"],
        "icon" => '<i class="fa-sharp fa-solid fa-traffic-light"></i>',
    ],
    [
        "title" => "Views",
        "subLinks" => ["cameraViewMulti.php", "cameraViewSingle.php", "recording.php"],
        "submenu" => ["Multi Camera View", "Single Camera View", "Recording Options"],
        "icon" => '<i class="fa-solid fa-tv"></i>',
    ],
    [
        "title" => "Reports",
        "subLinks" => ["dailySummary.php", "statistics.php", "history.php", "notifications.php"],
        "submenu" => ["Daily Summary", "Statistics", "History Viewer", "Notifications"],
        "icon" => '<i class="fa-solid fa-chart-simple"></i>',
    ],
    [
        "title" => "Settings",
        "subLinks" => ["config/configure.php", "renamePhases.php", "emailTester.php", "gps.php", "ntp.php", "corridorDesigner.php", "portalDesigner.php", "maintenance.php", "troubleshooting.php"],
        "submenu" => ["Configure Detectors", "Rename Phases", "Email Test", "GPS Coordinates", "NTP Server", "Management Group View Designer", "Portal Designer", "Maintenance", "Troubleshooting"],
        "icon" => '<i class="fa-solid fa-gear"></i>',
    ],
    [
        "title" => "Account",
        "subLinks" => ["invalidLogins.php", "editUsers.php"],
        "submenu" => ["Invalid Logins", "Edit Users"],
        "icon" => '<i class="fa-solid fa-user"></i>',
    ],
];
?>
<div id="application-sidebar" class="hs-overlay [--auto-close:lg]
  hs-overlay-open:translate-x-0
  -translate-x-full transition-all duration-300 transform
  w-[260px]
  hidden
  fixed inset-y-0 start-0 z-[60]
  bg-white
  lg:block lg:translate-x-0 lg:end-auto lg:bottom-0
  dark:bg-neutral-800 dark:border-neutral-700 lg:mt-15
 " style="top:74px">
    <!-- <div class="px-8 pt-4"> -->
    <!-- Logo -->
    <!-- <a class="flex-none rounded-xl text-xl  inline-block font-semibold focus:outline-none focus:opacity-80"
            href="../templates/admin/index.html" aria-label="Preline">
            <img src='assets/images/logo.svg' alt='Insync Ai Logo' />
        </a> -->
    <!-- End Logo -->
    <!-- </div> -->

    <nav class="hs-accordion-group p-6 w-full h-full overflow-y-auto flex flex-col flex-wrap border-e border-gray-200"
        data-hs-accordion-always-open>
        <ul class="space-y-1.5">
            <?php foreach ($menu as $item) {?>
            <li class="hs-accordion" id="users-accordion">
                <button type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5
                 hs-accordion-active:text-lime-600 hs-accordion-active:hover:bg-transparent text-sm text-neutral-700 rounded-lg
                 hover:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300
                 dark:hs-accordion-active:text-white">
                    <!-- <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg> -->
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
                    class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                    <ul class="hs-accordion-group pt-2" data-hs-accordion-always-open>
                        <?php foreach ($item['submenu'] as $index => $submenuTitle) {?>
                        <li class="hs-accordion" id="users-accordion-sub-1">
                            <a href="<?php echo "/" . $item['subLinks'][$index] ?>"
                                class="ps-8 hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent text-sm text-neutral-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300 dark:hs-accordion-active:text-white">
                                <?php echo $submenuTitle ?>
                            </a>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </li>
            <?php }?>
        </ul>
    </nav>
</div>