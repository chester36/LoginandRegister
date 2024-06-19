function toggleForm(showFormId, hideFormId) {
    var showForm = document.getElementById(showFormId);
    var hideForm = document.getElementById(hideFormId);

    // Show the selected form
    if (showForm.style.display === "none" || showForm.style.display === "") {
        showForm.style.display = "block";
    } else {
        showForm.style.display = "none";
    }

    // Hide the other form
    hideForm.style.display = "none";
}
