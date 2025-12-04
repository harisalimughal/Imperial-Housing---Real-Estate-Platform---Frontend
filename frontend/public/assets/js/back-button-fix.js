// Fix for browser back button with PHP server
(function () {
    // Prevent page from being cached
    window.addEventListener('pageshow', function (event) {
        // If the page is loaded from cache (back/forward button)
        if (event.persisted) {
            // Force reload to get fresh content
            window.location.reload();
        }
    });

    // Alternative: use history API to handle back button
    if (window.performance && window.performance.navigation.type === window.performance.navigation.TYPE_BACK_FORWARD) {
        // Page was loaded via back/forward button
        window.location.reload();
    }
})();
