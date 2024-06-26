<div class="relative w-64">
    <div class="flex flex-wrap gap-2 p-2 border rounded-md bg-white">
        <div class="flex items-center bg-gray-100 rounded-full px-3 py-1 text-sm">
            Pedestrians
            <button class="ml-2 text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <input type="text" class="flex-grow outline-none text-sm" placeholder="Add more...">
    </div>
</div>
<div class="relative w-64" id="tagInput">
    <!-- Input area for tags -->
    <div class="flex flex-wrap items-center border border-gray-300 rounded-md p-2 mb-1" id="tagContainer">
        <input type="text" class="flex-grow outline-none text-sm" placeholder="Include" id="tagInputField">
    </div>

    <!-- Dropdown menu -->
    <div class="absolute left-0 w-full bg-white border border-gray-300 rounded-md shadow-lg hidden" id="dropdown">
        <!-- General Movements section -->
        <div class="border-b border-gray-200">
            <div class="bg-gray-100 px-4 py-2 font-semibold text-sm">GENERAL MOVEMENTS</div>
            <ul class="py-1">
                <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-sm text-gray-600" data-value="Phase Volumes">
                    Phase Volumes</li>
                <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-sm text-gray-600" data-value="Pedestrians">
                    Pedestrians</li>
            </ul>
        </div>

        <!-- Results section -->
        <div class="border-b border-gray-200">
            <div class="bg-gray-100 px-4 py-2 font-semibold text-sm">RESULTS</div>
            <ul class="py-1">
                <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-sm text-gray-600" data-value="Errors">Errors
                </li>
                <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-sm text-gray-600" data-value="Successes">
                    Successes</li>
                <li class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-sm text-gray-600" data-value="Tunnels">
                    Tunnels</li>
            </ul>
        </div>

        <!-- Periods section -->
        <div>
            <div class="bg-gray-100 px-4 py-2 font-semibold text-sm">PERIODS</div>
        </div>
    </div>
</div>

<script>
const tagInput = document.getElementById('tagInput');
const tagContainer = document.getElementById('tagContainer');
const tagInputField = document.getElementById('tagInputField');
const dropdown = document.getElementById('dropdown');

// Toggle dropdown visibility
tagInputField.addEventListener('focus', () => dropdown.classList.remove('hidden'));
document.addEventListener('click', (e) => {
    if (!tagInput.contains(e.target)) dropdown.classList.add('hidden');
});

// Add tag when dropdown item is clicked
dropdown.addEventListener('click', (e) => {
    if (e.target.tagName === 'LI') {
        addTag(e.target.dataset.value);
        dropdown.classList.add('hidden');
    }
});

// Function to add a new tag
function addTag(value) {
    const tag = document.createElement('span');
    tag.classList.add('bg-gray-200', 'text-gray-700', 'rounded-md', 'px-2', 'py-1', 'text-sm', 'mr-2', 'mb-2', 'flex',
        'items-center');
    tag.innerHTML = `
    ${value}
    <button class="ml-1 text-gray-500 hover:text-gray-700 focus:outline-none" onclick="removeTag(this.parentElement)">×</button>
  `;
    tagContainer.insertBefore(tag, tagInputField);
}

// Function to remove a tag
function removeTag(tag) {
    tagContainer.removeChild(tag);
}
</script>
