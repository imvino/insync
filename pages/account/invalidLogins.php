<?php
// Start output buffering
ob_start();
?>
<div class="max-w-2xl">
    <div class="flex flex-col  bg-white">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded-lg overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                    DATE</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                    FAILED USERNAME
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                    SOURCE IP
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 font-medium ">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    11/14/2018 1:13:44 PM</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    PEC
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    10.102.56.24
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    11/14/2018 1:13:44 PM</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    PEC
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    10.102.56.24
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