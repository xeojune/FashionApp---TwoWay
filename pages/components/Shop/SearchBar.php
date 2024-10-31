<link rel="stylesheet" href="../../../styles/SearchBar.css">
<form method="POST" class="search-bar">
    <input 
        type="search"
        name="search"
        placeholder="Search and Enter"
        class="search-input"
        value="<?php echo htmlspecialchars($searchQuery); ?>"
        onfocus = "this.placeholder = ''"
        onblur="this.placeholder = 'Search...'"
        autocomplete="off"
    />
</form>