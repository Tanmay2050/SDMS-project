// Get the Add Data container and the toggle button
const addDataContainer = document.getElementById("addDataContainer");
const toggleFormBtn = document.getElementById("toggleFormBtn");

// Toggle the visibility of the Add Data container
toggleFormBtn.addEventListener("click", () => {
    if (addDataContainer.style.display === "none" || addDataContainer.style.display === "") {
        addDataContainer.style.display = "block";
    } else {
        addDataContainer.style.display = "none";
    }
});
