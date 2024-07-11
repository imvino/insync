<?php
// Start output buffering
extract(require_once '../../utils/tools.php');

ob_start();
$css = array(
    'label' => 'block text-sm font-medium min-w-[155px] dark:text-white',
);

function password($id)
{
    ?>
<div class="relative">
    <input id="<?php echo $id ?>" type="password" class="py-2 px-4 block w-full border-gray-200 rounded-lg text-sm dark:bg-neutral-500 dark:text-white dark:border-neutral-700 #
        focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none min-w-48"
        placeholder="<?php echo $id === 'password' ? 'Password' : 'Confirm Password' ?>" value="">
    <button type="button" data-hs-toggle-password='{
        "target": "#<?php echo $id ?>" }' class="absolute top-0 end-0 p-3.5 rounded-e-md">
        <svg class="flex-shrink-0 size-3.5 text-gray-400" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
            </path>
            <path class="hs-password-active:hidden"
                d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
            </path>
            <path class="hs-password-active:hidden"
                d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
            </path>
            <line class="hs-password-active:hidden" x1="2" x2="22" y1="2" y2="22"></line>
            <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
            <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3"></circle>
        </svg>
    </button>
</div>
<?php
}
?>

<div id="hs-vertically-centered-scrollable-modal"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
    <div
        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out
         transition-all md:max-w-2xl md:w-full m-3 md:mx-auto h-[calc(100%-3.5rem)] min-h-[calc(100%-3.5rem)] flex items-center">
        <div
            class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
            <div class="flex items-center py-3 px-4">
                <h3 class="font-bold text-gray-800 mx-auto dark:text-white">
                    Edit User Admin
                </h3>
                <button type="button"
                    class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent
        text-gray-800 dark:text-white hover:bg-gray-100  dark:hover:bg-neutral-700 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-overlay="#hs-vertically-centered-scrollable-modal">
                    <span class="sr-only">Close</span>
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="text-gray-500 text-center dark:text-white">Leave both password fields blank to keep the
                current password.
            </div>
            <div class="p-4 overflow-y-auto">
                <div class="flex items-center py-3 px-4">
                    <label class="<?php echo $css['label'] ?>">Password</label>
                    <?php echo password('password') ?>
                </div>
                <div class="flex items-center py-3 px-4">
                    <label class="<?php echo $css['label'] ?>">Confirm Password</label>
                    <?php echo password('confirmPassword') ?>
                </div>
                <div class="flex items-center py-3 px-4">
                    <label class="<?php echo $css['label'] ?>">Web/API Access</label>
                    <?php echo dropdown(1, array('WebUI & API', 'API Only'), 'API Only') .
toolTip(array('<strong>API Only:</strong> User has access to the InSync WebUI API only.',
    '<strong>WebUI &amp; API:</strong> User has access to both options.')) ?>
                </div>

                <div class="flex items-center py-3 px-4">
                    <label class="<?php echo $css['label'] ?>">Cameras</label>
                    <?php echo dropdown(2, array('Disabled', 'View Only', 'View / Control'), 'View / Control') .
toolTip(array('<strong>Disabled:</strong> No access to cameras.', '<strong>View Only:</strong> User can view cameras but not control or record.',
    '<strong>View ⁄ Record:</strong> User has full access to view, control, and record cameras.')); ?>
                </div>

                <div class="flex items-center py-3 px-4">
                    <label class="<?php echo $css['label'] ?>">Session Timeout</label>
                    <?php echo dropdown(2, array('Disabled', 5, 10, 15, 30, 45, 60, 120, 540), '5', 'min-w-32') ?>
                    <p class="block text-sm font-medium ml dark:text-white">minutes</p>
                    <?php echo toolTip(array('The number of minutes your browser can sit', 'idle before you are logged out of the
                    WebUI', )) ?>

                </div>
                <div class="flex items-top py-3 px-4">
                    <div class="flex flex-col space-y-4 ">

                        <?php echo checkboxList('User Enabled', array('Chooses if the user is active ⁄ inactive.', 'If they are not enabled, they cannot login.'), $css['label']) ?>
                        <?php echo checkboxList('InSync Maintenance', array('Enables ⁄ disables access to the Maintenance page.'), $css['label']) ?>
                        <?php echo checkboxList('Configure Intersection', array('Enables ⁄ disables configuration via', 'the "Configure Detectors" web utility.'), $css['label']) ?>
                        <?php echo checkboxList('Administer Users', array('Enables ⁄ disables administration of users.', 'With this flag, users can add, edit, or delete any user!'), $css['label']) ?>
                    </div>
                    <div class="flex flex-col space-y-4 mx-4">
                        <?php echo checkboxList('View Reports', array('Enables ⁄ disables viewing of Reports pages.'), $css['label'] . ' min-w-[270px] ') ?>
                        <?php echo checkboxList('Management Group Maintenance', array('Enables ⁄ disables access to Management Group Maintenance.'), 'min-w-[270px] ') ?>
                        <?php echo checkboxList('Manual Traffic Calls', array('Enables ⁄ disables placing of manual', 'calls, queues, and pedestrian button pushes.'), 'min-w-[270px] ') ?>
                    </div>
                </div>
            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm
         hover:bg-lime-100 hover:text-white dark:border-neutral-700 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-overlay="#hs-vertically-centered-scrollable-modal">
                    Close </button>
                <button type="button" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 hover:bg-white hover:text-gray-800 shadow-sm
         bg-lime-100 text-white dark:border-neutral-700 disabled:opacity-50 disabled:pointer-events-none">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
<div class="max-w-xs">
    <div class="flex flex-col bg-white dark:bg-neutral-900">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded-lg overflow-hidden dark:border-neutral-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="bg-gray-50 dark:bg-neutral-800">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-400">
                                    Users</th>
                                <th scope="col">
                                </th>
                                <th scope="col">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700 font-medium">
                            <?php foreach (array('User Admin', 'User View') as $title) {?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                    <?php echo $title ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                    <button data-hs-overlay="#hs-vertically-centered-scrollable-modal"
                                        class="hover:text-lime-100"><i class="fa-light fa-file-pen"></i></button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                    <button href="#" class="hover:text-lime-100"><i button
                                            class="fa-light fa-trash"></i></button>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php foreach (array('Propagate User', 'New User') as $title) {?>
<button type="button" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 hover:bg-white hover:text-gray-800 shadow-sm
         bg-lime-100 text-white dark:border-neutral-700 disabled:opacity-50 disabled:pointer-events-none">
    <?php echo $title ?>
</button>
<?php }?>
<?php
// Get the buffered output
$content = ob_get_clean();

// Include the base.php file and pass the content
include '../../base.php';
?>