<?php
// Function to render the dropdown menu
function render_dropdown_menu($menu)
{
    $head = "bg-gray-100 px-4 py-2 font-semibold text-sm";
    $li = "px-4 py-2 hover:bg-gray-100 cursor-pointer text-sm text-gray-600";

    foreach ($menu as $section) {
        echo '<div class="border-b border-gray-200">';
        echo '<div class="' . $head . '">' . $section['title'] . '</div>';
        echo '<ul class="py-1">';
        foreach ($section['items'] as $item) {
            echo '<li @click="toggleTag(\'' . $item . '\')" :class="{\'bg-gray-100\': tags.includes(\'' . $item . '\')}" class="' . $li . '">' . $item . '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }
}
function inputTags($title, $dropdown_menu)
{

    ?>
<div x-data="tagSelector()">
    <div id="tagInputContainer" class="max-width-container">
        <div class="flex flex-col">
            <label class="mb-1 text-sm font-medium text-gray-700 dark:text-white">
                <?php echo $title ?>
            </label>
            <div @click="openDropdown" id="tagInput"
                class="hs-dropdown-toggle py-1 px-2 inline-flex items-center gap-x-2 font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm disabled:opacity-50 disabled:pointer-events-none">
                <span id="tagDisplay">
                    <template x-for="tag in tags" :key="tag">
                        <span
                            class="tag rounded-full px-2 py-0 text-gray-600 border text-[10px] inline-flex items-center mr-1 mb-1">
                            <span x-text="tag"></span>
                            <span @click.stop="removeTag(tag)" class="font-semibold cursor-pointer ml-1">&times;</span>
                        </span>
                    </template>
                </span>
                <input x-ref="hiddenInputField" @keydown.enter.prevent="addTag($event.target.value)"
                    @keydown.space.prevent="addTag($event.target.value)" @keydown.backspace="handleBackspace"
                    type="text" class="hidden-input" />
            </div>
        </div>
        <!-- Dropdown menu -->
        <div x-show="isOpen" @click.away="closeDropdown"
            class="w-full absolute mt-1 max-w-[230px] bg-white border border-gray-100 rounded-md shadow-lg"
            id="dropdown">
            <?php render_dropdown_menu($dropdown_menu);?>
        </div>

        <form action="">
            <input x-model="tagsString" id="hiddenInput" type="text" name="tags" hidden>
        </form>

    </div>
</div>
<?php
}?>
<script>
function tagSelector() {
    return {
        tags: [],
        isOpen: false,
        tagsString: '',
        openDropdown() {
            this.isOpen = true;
            this.$nextTick(() => this.$refs.hiddenInputField.focus());
        },
        closeDropdown() {
            this.isOpen = false;
        },
        addTag(tag) {
            tag = tag.trim();
            if (tag && !this.tags.includes(tag)) {
                this.tags.push(tag);
                this.updateTagsString();
            }
            this.$refs.hiddenInputField.value = '';
        },
        removeTag(tag) {
            this.tags = this.tags.filter(t => t !== tag);
            this.updateTagsString();
        },
        toggleTag(tag) {
            if (this.tags.includes(tag)) {
                this.removeTag(tag);
            } else {
                this.addTag(tag);
            }
            this.closeDropdown();
        },
        handleBackspace(e) {
            if (e.target.value === '' && this.tags.length > 0) {
                this.tags.pop();
                this.updateTagsString();
            }
        },
        updateTagsString() {
            this.tagsString = this.tags.join(',');
        }
    }
}
</script>

<style>
.max-width-container {
    width: 400px;
}

.tag {
    display: inline-block;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    background-color: #f8fafc;
}

.tag span {
    cursor: pointer;
}

.hs-dropdown-toggle {
    width: 100%;
    max-width: 400px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    min-height: 34px;
    cursor: text;
}

.hidden-input {
    position: absolute;
    opacity: 0;
    pointer-events: none;
}
</style>