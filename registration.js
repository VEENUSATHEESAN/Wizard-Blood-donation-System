document.getElementById('donorForm').addEventListener('submit', function(event) {
  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirm-password').value;

  // Check for password mismatch
  if (password !== confirmPassword) {
    event.preventDefault(); // Stop form submission
    alert('Passwords do not match. Please re-enter your password.');
  }
});

function validateForm() {
  const name = document.getElementById('name').value;
  const age = document.getElementById('age').value;
  const bloodGroup = document.getElementById('blood-group').value;
  const contact = document.getElementById('contact').value;
  const healthStatus = document.getElementById('health-status').value;

  // Basic validation to ensure no field is empty
  if (!name || !age || !bloodGroup || !contact || !healthStatus) {
    alert('Please fill out all fields');
    return false;
  }
  
  alert('Registration successful!');
  return true;
}
