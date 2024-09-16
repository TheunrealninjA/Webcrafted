document.addEventListener("DOMContentLoaded", function () {
    const checkboxes = document.querySelectorAll('.filter-checkbox');
    const businessCheckbox = document.getElementById('business-checkbox');
    const businessTypeContainer = document.getElementById('business-type-container');
    let selectedCheckboxes = [];

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', handleCheckboxChange);
    });

    function handleCheckboxChange(event) {
        const checked = event.target.checked;
        const value = event.target.value;

        if (value === 'business') {
            businessTypeContainer.style.display = checked ? 'block' : 'none';
        }

        if (checked) {
            if (selectedCheckboxes.length >= 2 && value !== 'business') {
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
            const businessType = item.getAttribute('data-business-type');

            console.warn(activeFilters);
            

            if (activeFilters.includes('business')) {
                if (activeFilters.includes(businessType)){
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            } else if (activeFilters.includes('business')) {
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