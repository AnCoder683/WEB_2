function changeURL(newURL) {
    window.history.pushState({ path: newURL }, '', newURL);
}