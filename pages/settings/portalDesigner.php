<?php
extract(require_once '../../utils/tools.php');
// Start output buffering
ob_start();
$tab = "py-2.5 px-4 inline-flex items-center gap-x-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
?>
<div class="my-4 mb-8">
    <div class="flex justify-between items-center">
        <div class="flex flex-col">
            <?php echo inputBox(['title' => 'Portal Title', 'value' => 'Portal Title', 'placeholder' => 'Portal Title']); ?>
        </div>
        <div>
            <div class="hs-dropdown relative inline-flex">
                <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border
                border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50
                disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white
                dark:hover:bg-neutral-800">
                    <span>+ Add</span> <!-- Bind text to selectedOption -->
                    <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6" />
                    </svg>
                </button>
                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-40 bg-white shadow-md rounded-lg
            p-2 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0
            after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full">
                    <a class='dropdown-item flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none
                focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700'
                        href='#'>Management Group</a>
                </div>
            </div>
            <div class="inline-flex rounded-lg shadow-sm">
                <button type="button" class="<?php echo $tab ?>">
                    <i class="fa-regular fa-regular fa-floppy-disk"></i>
                </button>
                <button type="button" class="<?php echo $tab ?>">
                    <i class="fa-regular fa-regular fa-floppy-disks"></i>
                </button>
                <button type="button" class="<?php echo $tab ?>">
                    <i class="fa-regular fa-arrow-down-to-bracket"></i>
                </button>
                <button type="button" class="<?php echo $tab ?>">
                    <i class="fa-regular fa-regular fa-wand-magic-sparkles"></i>
                </button>
                <button type="button" class="<?php echo $tab ?>">
                    <i class="fa-regular fa-arrow-up-from-bracket"></i>
                </button>
            </div>
            <button type="button"
                class="py-2.5 px-4 inline-flex items-center gap-x-2 -ms-px text-sm font-medium focus:z-10 text-lime-400 ">
                <i class="fa-solid fa-broom-wide"></i>
            </button>
        </div>
    </div>
    <div class="w-[1000px] h-0.5 bg-gray-200 my-8"></div>


    <div class="flex flex-col  max-w-xs">
        <label class="mb-1 text-sm font-medium text-gray-700 dark:text-white">Management Group Title</label>
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm" data-hs-input-number="">
            <div class="hs-dropdown w-full flex justify-between items-center gap-x-1">
                <div class="grow py-1 px-3">
                    <input class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0" type="text"
                        placeholder="Management Group Name">
                </div>
                <div id="hs-dropdown-default"
                    class="hs-dropdown-toggle flex items-center -gap-y-px divide-x divide-gray-200 border-s border-gray-200">
                    <button type="button" style="height: 32px" class="size-10 inline-flex justify-center items-center gap-x-2 text-sm font-medium last:rounded-e-lg bg-white
                        text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                        <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5v14"></path>
                        </svg>
                    </button>
                </div>
                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-40 bg-white shadow-md rounded-lg
            p-2 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0
            after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full">
                    <a class='dropdown-item flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none
                focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700'
                        href='#'>Map</a>
                    <a class='dropdown-item flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none
                focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700'
                        href='#'>Intersection</a>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col bg-white dark:bg-neutral-900 mt-4 max-w-4xl">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded-lg overflow-hidden dark:border-neutral-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="bg-gray-50 dark:bg-neutral-800">
                            <tr>
                                <th scope="col" class="py-3 ps-4">
                                    <div class="flex items-center h-5">
                                        <input id="hs-table-checkbox-all" type="checkbox"
                                            class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-700 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500">
                                        <label for="hs-table-checkbox-all" class="sr-only">Checkbox</label>
                                    </div>
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">
                                    INTERSECTION</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">
                                    IP</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">
                                    ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            <tr class="bg-white dark:bg-neutral-900">
                                <td class="py-3 ps-4">
                                    <div class="flex items-center h-5">
                                        <input id="hs-table-checkbox-1" type="checkbox"
                                            class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-700 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500">
                                        <label for="hs-table-checkbox-1" class="sr-only">Checkbox</label>
                                    </div>
                                </td>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                    41st Ave & Capitola Mall Ent</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                    192.168.62.41
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex justify-between items-center space-x-4">
                                        <button
                                            class="group text-lime-100 hover:text-green-800 dark:text-neutral-400 dark:hover:text-green-500">
                                            <svg class="w-5 h-5 stroke-current" viewBox="0 0 14 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <!-- SVG path for camera icon -->
                                            </svg>
                                        </button>
                                        <button
                                            class="group text-lime-100 hover:text-green-800 dark:text-neutral-400 dark:hover:text-green-500">
                                            <svg class="w-5 h-5 stroke-current" viewBox="0 0 14 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <!-- SVG path for network icon -->
                                            </svg>
                                        </button>
                                        <button
                                            class="text-lime-100 hover:text-green-800 dark:text-neutral-400 dark:hover:text-red-500">Delete</button>
                                    </div>
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