(function () {
    const html = document.documentElement;

    const selectors = [
        document.getElementById("themeSelector"),
        document.getElementById("themeSelectorMobile"),
    ].filter(Boolean); // buang null

    function getTheme() {
        return localStorage.getItem("theme") || "light";
    }

    function applyTheme(theme) {
        html.setAttribute("data-theme", theme);
        localStorage.setItem("theme", theme);

        selectors.forEach((select) => {
            if (select.value !== theme) {
                select.value = theme;
            }
        });
    }

    // Apply theme immediately (hindari flash)
    applyTheme(getTheme());

    // Attach listeners
    selectors.forEach((select) => {
        select.addEventListener("change", () => {
            applyTheme(select.value);
        });
    });
})();
