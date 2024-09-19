// Smooth Scrolling for internal navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();
      const targetElement = document.querySelector(this.getAttribute('href'));
      
      if (targetElement) {
        window.scroll({
          top: targetElement.offsetTop - 50, // Adjust for header height
          behavior: 'smooth'
        });
      }
    });
  });
  
  // Show an alert when the "Register Now" button is clicked
  const registerButton = document.querySelector('.cta-button');
  registerButton.addEventListener('click', function() {
    alert('Thank you for your interest! Please visit the registration page to proceed.');
  });
  