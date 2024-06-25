<?php
function find_breadcrumb($menu, $current_page)
{
    foreach ($menu as $menu_group) {
        // Check if current page is in the subLinks of the current menu group
        $subLink_index = array_search($current_page, $menu_group['subLinks']);
        if ($subLink_index !== false) {
            // If found, set the breadcrumb
            return [
                "title" => $menu_group['title'],
                "subtitle" => $menu_group['submenu'][$subLink_index],
            ];
        }
    }
    return [];
}

$breadcrumb = find_breadcrumb($menu, $current_page);?>
<header class="sticky top-0 inset-x-0 flex flex-wrap sm:justify-start sm:flex-nowrap z-[48] w-full bg-white border-b text-sm
py-2 dark:bg-neutral-800 dark:border-neutral-700">
    <nav class="flex basis-full items-center w-full mx-auto px-4 sm:px-6" aria-label="Global">
        <div class="me-5 lg:me-0" style="min-width: 210px;">
            <!-- Logo -->
            <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
                href="/" aria-label="Preline">
                <img src='/assets/images/logo.svg' alt='Insync Ai Logo' width="150" />
            </a>
            <!-- End Logo -->
        </div>

        <div class="w-full flex items-center justify-end ms-auto sm:justify-between sm:gap-x-3 sm:order-3 mx-3">
            <div class="sm:hidden">
                <button type="button"
                    class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700">
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                </button>
            </div>

            <!-- <div class="hidden sm:block">
                </div> -->
            <!-- Breadcrumb -->

            <ol class="ms-3 flex items-center whitespace-nowrap px-8">
                <?php 
                if (!empty($breadcrumb)) {?>
                <li class="flex items-center text-sm text-gray-800 dark:text-neutral-400">
                    <?php echo $breadcrumb['title'] ?>
                    <svg class="flex-shrink-0 mx-3 overflow-visible size-2.5 text-gray-400 dark:text-neutral-500"
                        width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </li>
                <li class="text-sm font-semibold text-gray-800 truncate dark:text-neutral-400" aria-current="page">
                    <?php echo $breadcrumb['subtitle'] ?>
                </li>
                <?php }?>
            </ol>

            <!-- Breadcrumb End-->
            <div class="flex flex-row items-center justify-end gap-2">
                <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                    <button id="hs-dropdown-with-header" type="button"
                        class="h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm rounded-full border border-transparent text-gray-800 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700">
                        <i class="fa-regular fa-circle-user"></i>
                        <!-- <img class="inline-block size-[38px] rounded-full ring-2 ring-white dark:ring-neutral-800"
                                src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                alt="Image Description"> -->
                        <span class="inline-block align-middle">Username</span>
                    </button>
                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-36 bg-white shadow-md shadow-inner rounded-lg p-2 dark:bg-neutral-900 dark:border dark:border-neutral-700"
                        aria-labelledby="hs-dropdown-with-header">
                        <div class="mt-2 py-2 first:pt-0 last:pb-0">
                            <a class="flex items-center gap-x-3.5 py-3 px-3 rounded-lg text-sm text-gray-800 hover:text-lime-100 focus:ring-2 focus:ring-blue-500 dark:text-neutral-400"
                                href="#">
                                Home
                            </a>
                            <a class="flex items-center gap-x-3.5 py-3 px-3 rounded-lg text-sm text-gray-800 hover:text-lime-100 focus:ring-2 focus:ring-blue-500 dark:text-neutral-400"
                                href="#">
                                Help
                            </a>
                            <hr>
                            <a class="flex items-center gap-x-3.5 py-3 px-3 rounded-lg text-sm text-gray-800 hover:text-lime-100 focus:ring-2 focus:ring-blue-500 dark:text-neutral-400"
                                href="#">
                                Logout...
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>