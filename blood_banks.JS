document.getElementById('filterForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission to the server

    const location = document.getElementById('location').value;
    const bloodGroup = document.getElementById('blood-group').value;

    // Build the query string for the PHP file
    const queryString = `blood_banks.php?location=${encodeURIComponent(location)}&blood_group=${encodeURIComponent(bloodGroup)}`;

    // Fetch the filtered blood bank data
    fetch(queryString)
        .then(response => response.text())
        .then(data => {
            document.getElementById('bloodBankList').innerHTML = data;
        })
        .catch(error => {
            console.error('Error fetching blood banks:', error);
            document.getElementById('bloodBankList').innerHTML = "<p>Error loading blood banks. Please try again later.</p>";
        });
});
