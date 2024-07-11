<?php
// Start output buffering
ob_start();
?>

<div class="dark:text-white"><iframe
        src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d16118.491032162456!2d-94.42617853601783!3d37.05987893127256!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sin!4v1720695584605!5m2!1sen!2sin"
        width="100%" height="100" style="border:0;height:90vh" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe></div>

<?php
// Get the buffered output
$content = ob_get_clean();

// Include the base.php file and pass the content
include '../../base.php';

?>