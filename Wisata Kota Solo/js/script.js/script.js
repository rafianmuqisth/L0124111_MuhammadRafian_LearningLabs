document.getElementById("feedbackForm").addEventListener("submit", function(event) {
    event.preventDefault();
    alert("Terima kasih atas feedback Anda!");
    document.getElementById("feedbackForm").reset();
});
