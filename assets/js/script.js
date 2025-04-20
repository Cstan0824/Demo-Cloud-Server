document.addEventListener("DOMContentLoaded", () => {
    const toggleButton = document.getElementById("toggleCompleted");
    let showCompleted = true;

    toggleButton.addEventListener("click", () => {
        const rows = document.querySelectorAll("tr[data-status='1']");
        rows.forEach(row => {
            row.style.display = showCompleted ? "none" : "";
        });

        showCompleted = !showCompleted;
        toggleButton.textContent = showCompleted ? "Hide Completed" : "Show Completed";
    });
});
