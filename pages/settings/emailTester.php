<?php // Start output buffering

extract(require_once '../../utils/tools.php');

ob_start();?>
<div class="flex items-end">
    <div class="flex flex-col"><?php echo inputBox(['title' => 'Mail to']); ?></div>
    <div class="flex flex-col ml-2"><?php echo inputBox(['title' => 'Mail from']); ?></div>
</div>
<div class="flex items-end">
    <div class="flex flex-col">
        <?php echo inputBox(['title' => 'SMTP Server', 'tip' => array('Add DNS Server if not using an IP address for SMTP server to prevent exceptions during send')]); ?>
    </div>
    <div class="flex flex-col ml-2"><?php echo inputBox(['title' => 'SMTP Port']); ?></div>
</div>
<div class="flex items-top ">
    <div class="flex flex-col space-y-4 ">
        <?php
$label = "block text-sm font-medium text-gray-700 mb-1 min-w-24";
echo checkboxList('Try All', array('Test all ports and combinations of authorization and ssl.', 'Auth(yes/no)', 'Ports(25,2525,465,587)'), $label);
echo checkboxList('Use Auth', array('Use authentication when sending email.'), $label);
echo checkboxList('Use Ssl/Tls', array('Send email using SSL.'), $label);
?>
    </div>
</div>
<div class="flex items-end">
    <div class="flex flex-col"><?php echo inputBox(['title' => 'Username']); ?></div>
    <div class="flex flex-col ml-2"><?php echo inputBox(['title' => 'Password']); ?></div>
</div>
<div class=" flex items-end">
    <div>
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm
         hover:bg-lime-100 hover:text-white dark:border-neutral-700 disabled:opacity-50 disabled:pointer-events-none">
            Rest </button>
        <button type="button" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 hover:bg-white hover:text-gray-800 shadow-sm
         bg-lime-100 text-white dark:border-neutral-700 disabled:opacity-50 disabled:pointer-events-none">
            Send Email
        </button>
    </div>
</div>
<div style="width:30rem">
    <textarea placeholder="Result" class=" py-3 px-4 block w-full  border-gray-200 rounded-lg text-sm focus:border-blue-500
    focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700
    dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3"></textarea>
</div>
<?php
// Get the buffered output
$content = ob_get_clean();

// Include the base.php file and pass the content
include '../../base.php';

?>