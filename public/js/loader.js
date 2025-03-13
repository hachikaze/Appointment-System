document.addEventListener("DOMContentLoaded", function () {
    const loader = document.getElementById("loader");

    function showLoader() {
        loader.classList.remove("hidden");
    }

    function hideLoader() {
        loader.classList.add("hidden");
    }

    document.querySelectorAll("form").forEach((form) => {
        form.addEventListener("submit", () => showLoader());
    });

    document.addEventListener("ajaxStart", () => showLoader());
    document.addEventListener("ajaxStop", () => hideLoader());

    window.addEventListener("load", () => hideLoader());
});
