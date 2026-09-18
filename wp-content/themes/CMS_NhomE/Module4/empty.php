<?php /** Module 4: thông báo tìm kiếm không có kết quả. */ ?>
<div class="module-4-search-section">
    <div class="module-4-card">
        <div class="module-4-top-content">
            <h1 class="module-4-title"><span class="text-red">Search:</span> <span class="text-query">&ldquo;<?php echo esc_html( get_search_query( false ) ); ?>&rdquo;</span></h1>
            <p class="module-4-subtitle">We could not find any results for your search. You can give it another try through the search form below.</p>
        </div>
        <div class="module-4-search-banner">
            <form role="search" method="get" class="module-4-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <label class="sr-only" for="module-4-search-input">Từ khóa tìm kiếm</label>
                <span class="module-4-search-icon" aria-hidden="true"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input id="module-4-search-input" type="search" class="module-4-search-input" name="s" placeholder="Search topics or keywords" required>
                <button type="submit" class="module-4-search-btn">Search</button>
            </form>
        </div>
    </div>
</div>
