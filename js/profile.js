/**
 * Initialize a checkbox dropdown menu with persistent selection.
 * @param {string} buttonId - The ID of the button that opens the dropdown.
 * @param {string} textId - The ID of the span that displays the selected text.
 * @param {string} storageKey - The key to save data in localStorage.
 */
function initializeCheckboxDropdown(buttonId, textId, storageKey) {
    const dropdownButton = document.getElementById(buttonId);
    if (!dropdownButton) {
        return;
    }

    const dropdownMenu = document.querySelector(`[aria-labelledby="${buttonId}"]`);
    const checkboxes = dropdownMenu.querySelectorAll('input[type="checkbox"]');
    const selectedTextElem = document.getElementById(textId);
    const placeholder = 'Select...';

    function updateSelectedText() {
        const selected = Array.from(checkboxes)
            .filter(cb => cb.checked)
            .map(cb => cb.value);

        selectedTextElem.textContent = selected.length > 0 ? selected.join(', ') : placeholder;
    }

    function saveSelection() {
        const selectedValues = Array.from(checkboxes)
            .filter(cb => cb.checked)
            .map(cb => cb.value);
        localStorage.setItem(storageKey, JSON.stringify(selectedValues));
    }

    function loadSelection() {
        const savedSelection = JSON.parse(localStorage.getItem(storageKey));
        if (savedSelection && Array.isArray(savedSelection)) {
            checkboxes.forEach(cb => {
                cb.checked = savedSelection.includes(cb.value);
            });
        }
    }

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            updateSelectedText();
            saveSelection();
        });
    });

    loadSelection();
    updateSelectedText();
}

initializeCheckboxDropdown('partner-select-btn', 'partner-select-text', 'selectedPartners');
initializeCheckboxDropdown('comm-style-select-btn', 'comm-style-select-text', 'selectedCommStyle');