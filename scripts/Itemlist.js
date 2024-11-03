// scripts.js

// Toggle visibility of filter lists
function toggleFilterVisibility(button) {
    // Check if `.list` or `.List` exists within the clicked button's closest `.filter-wrapper` container
    const filterWrapper = button.closest('.filter-wrapper');
    const filterList = filterWrapper.querySelector('.list');
    const productFilterList = filterWrapper.querySelector('.List');
    
    // Toggle visibility for `.list` if it exists
    if (filterList) {
        const isHidden = filterList.classList.toggle('hidden');
        button.textContent = isHidden ? '+' : '-';
    }
    
    // Toggle visibility for `.List` if it exists
    if (productFilterList) {
        const isHidden = productFilterList.classList.toggle('hidden');
        button.textContent = isHidden ? '+' : '-';
    }
}

function selectFilter(button, filterId, filterType, filterName) {
    const isSelected = button.classList.toggle('selected');
    const inputName = {
        selectFilter: 'selectFilter[]',
        selectPrice: 'selectPrice[]',
        selectShoeSize: 'selectShoeSize[]',
        selectClothSize: 'selectClothSize[]',
    }[filterType];

    const form = document.getElementById('filter-form');
    const existingInput = document.querySelector(`input[name="${inputName}"][value="${filterId}"]`);
    const existingTag = document.querySelector(`.filter-category[data-filter-id="${filterId}"][data-filter-type="${filterType}"]`);

    if (isSelected && !existingInput) {
        // If selected and not already present, create hidden input and filter tag
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = inputName;
        hiddenInput.value = filterId;
        form.appendChild(hiddenInput);

        const filterTag = document.createElement('div');
        filterTag.classList.add('filter-category');
        filterTag.dataset.filterId = filterId;
        filterTag.dataset.filterType = filterType;
        filterTag.innerHTML = `
            ${filterName} <button class="delete-button" onclick="removeFilter(${filterId}, '${filterType}')">X</button>
        `;
        document.querySelector('.filter-categories').appendChild(filterTag);
    } else if (!isSelected && existingInput) {
        // If deselected, remove both hidden input and filter tag
        existingInput.remove();
        if (existingTag) existingTag.remove();
    }

    updateTotalFilter();
    form.submit(); // Submit the form automatically whenever a filter is added or removed
}


function deleteAllFilters() {
    // Uncheck all checkboxes in Filter.php
    document.querySelectorAll('.checkbox').forEach(checkbox => {
        checkbox.checked = false;
    });

    // Remove the "selected" class from buttons in ProductFilter.php
    document.querySelectorAll('.checkBox.selected').forEach(button => {
        button.classList.remove('selected');
    });

    // Remove all hidden input fields that hold filter data in the form
    document.querySelectorAll('#filter-form input[type="hidden"]').forEach(input => {
        input.remove();
    });

    // Reset the displayed filter count
    updateTotalFilter();

    // Submit the form to apply the cleared filters on the server side
    document.getElementById('filter-form').submit();
}

function updateTotalFilter() {
    // Calculate totalFilter by counting selected items from both ProductFilter and Filter checkboxes
    const totalFilter = document.querySelectorAll('.checkBox.selected, .checkbox:checked').length;

    // Get filter-status and filter-delete elements
    const filterStatus = document.querySelector('.filter-status');
    const clearAllButton = document.querySelector('.filter-delete');

    // Show or hide filter-status and Clear All button based on totalFilter count
    if (totalFilter > 0) {
        if (filterStatus) filterStatus.style.display = 'inline-block';
        if (clearAllButton) clearAllButton.style.display = 'inline-block';
        if (filterStatus) filterStatus.textContent = totalFilter;
    } else {
        if (filterStatus) filterStatus.style.display = 'none';
        if (clearAllButton) clearAllButton.style.display = 'none';
    }
}


function deleteFilter(id, type) {
    // Handle deletion based on the type of filter
    switch (type) {
        case 'selectFilter':
            selectedFilter = {}; // Clear the selected filter
            break;
        case 'selectPrice':
            selectedPrice = {}; // Clear the selected price
            break;
        case 'selectShoeSize':
            selectedShoeSizes = selectedShoeSizes.filter(size => size.id !== id);
            break;
        case 'selectClothSize':
            selectedClothSizes = selectedClothSizes.filter(size => size.id !== id);
            break;
    }

    // Update the displayed total filter count
    updateTotalFilter();

    // Optionally, refresh the product list to reflect changes without reloading
    loadFilteredProducts();
}

function removeFilter(filterId, filterType) {
    const inputName = {
        selectFilter: 'selectFilter[]',
        selectPrice: 'selectPrice[]',
        selectShoeSize: 'selectShoeSize[]',
        selectClothSize: 'selectClothSize[]',
    }[filterType];

    const existingInput = document.querySelector(`input[name="${inputName}"][value="${filterId}"]`);
    const existingTag = document.querySelector(`.filter-category[data-filter-id="${filterId}"][data-filter-type="${filterType}"]`);
    const button = document.querySelector(`.checkBox[data-filter-id="${filterId}"]`);

    if (existingInput) existingInput.remove();
    if (existingTag) existingTag.remove();
    if (button) button.classList.remove('selected'); // Deselect the button

    updateTotalFilter();
    document.getElementById('filter-form').submit(); // Submit form automatically on removal
}






