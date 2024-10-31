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
    button.classList.toggle('selected');

    const inputName = {
        selectFilter: 'selectFilter[]',
        selectPrice: 'selectPrice[]',
        selectShoeSize: 'selectShoeSize[]',
        selectClothSize: 'selectClothSize[]',
    }[filterType];

    // Check if the filter tag already exists
    let existingTag = document.querySelector(`.filter-category[data-filter-id="${filterId}"][data-filter-type="${filterType}"]`);
    
    if (!existingTag) {
        // Create and display a new tag if one doesn't already exist
        const filterTag = document.createElement('div');
        filterTag.classList.add('filter-category');
        filterTag.dataset.filterId = filterId;
        filterTag.dataset.filterType = filterType;
        filterTag.innerHTML = `
            ${filterName}
            <button class="delete-button" onclick="removeFilter(${filterId}, '${filterType}')">X</button>
        `;
        document.querySelector('.filter-categories').appendChild(filterTag);

        // Add a hidden input to the form to track this filter in $_POST
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = inputName;
        hiddenInput.value = filterId;
        document.getElementById('filter-form').appendChild(hiddenInput);
    } else {
        // If tag already exists, remove it along with the hidden input
        existingTag.remove();
        const hiddenInput = document.querySelector(`input[name="${inputName}"][value="${filterId}"]`);
        if (hiddenInput) hiddenInput.remove();
    }

    updateTotalFilter();

    // Submit the form to update the selection
    document.getElementById('filter-form').submit();
}





// Clear all selected filters
function deleteAllFilters() {
    // Uncheck all checkboxes in Filter.php
    document.querySelectorAll('.checkbox').forEach(checkbox => {
        checkbox.checked = false;
    });

    // Remove the "selected" class from buttons in ProductFilter.php
    document.querySelectorAll('.checkBox.selected').forEach(button => {
        button.classList.remove('selected');
    });

    // Reset the displayed filter count
    updateTotalFilter();

    // Optionally, submit the form to reset the server-side filters
    // document.getElementById('filter-form').submit();
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

    // Uncheck the checkbox or button selection in the form
    const checkbox = document.querySelector(`input[name="${inputName}"][value="${filterId}"]`);
    if (checkbox) checkbox.checked = false;

    // For button-style selections (like shoes and clothes), remove the selected class
    const button = document.querySelector(`.checkBox.${filterType}[value="${filterId}"]`);
    if (button) button.classList.remove('selected');

    // Remove the filter tag visually
    const tag = document.querySelector(`.filter-category[data-filter-id="${filterId}"][data-filter-type="${filterType}"]`);
    if (tag) tag.remove();

    // Update the total filter count
    updateTotalFilter();

    // Submit the form to reflect the updated state
    document.getElementById('filter-form').submit();
}






