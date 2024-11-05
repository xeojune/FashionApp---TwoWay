document.addEventListener("DOMContentLoaded", function() {
    const removeLinks = document.querySelectorAll(".actions a.remove");

    removeLinks.forEach(link => {
        link.addEventListener("click", function(event) {
            event.preventDefault();
            const item = this.closest(".wishlist-item");

            // Confirm removal action
            if (confirm("Are you sure you want to remove this item from your wish list?")) {
                item.remove();
                updateItemCount();
            }
        });
    });

    function updateItemCount() {
        const itemCountElement = document.querySelector(".container p");
        const items = document.querySelectorAll(".wishlist-item");

        if (items.length === 0) {
            itemCountElement.textContent = "No items in your wish list";
        } else {
            itemCountElement.textContent = `${items.length} item${items.length > 1 ? 's' : ''} in your wish list`;
        }
    }
});