document.addEventListener("DOMContentLoaded", function () {
    const checkboxes = document.querySelectorAll('.filter-checkbox');
    let selectedCheckboxes = [];

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', handleCheckboxChange);
    });

    function handleCheckboxChange(event) {
        const checked = event.target.checked;
        if (checked) {
            if (selectedCheckboxes.length >= 2) {
                const firstCheckbox = selectedCheckboxes.shift();
                firstCheckbox.checked = false;
            }
            selectedCheckboxes.push(event.target);
        } else {
            const index = selectedCheckboxes.indexOf(event.target);
            if (index > -1) {
                selectedCheckboxes.splice(index, 1);
            }
        }
        filterItems();
    }
    
    function filterItems() {
        const activeFilters = selectedCheckboxes.map(checkbox => checkbox.value);
        const items = document.querySelectorAll('.filter-item');

        items.forEach(item => {
            const category = item.getAttribute('data-category');
            if (activeFilters.includes(category)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });

        if (activeFilters.length === 0) {
            items.forEach(item => {
                item.style.display = 'block';
            });
        }
    }
    filterItems();
});