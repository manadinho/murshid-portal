document.addEventListener('DOMContentLoaded', function () {
    const togglePasswordButtons = document.querySelectorAll('.toggle-password');
    togglePasswordButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const passwordField = button.previousElementSibling;
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
  
            // Toggle icon
            const icon = button.querySelector('i');
            if (type === 'password') {
                icon.classList.remove('bi-eye-fill');
                icon.classList.add('bi-eye-slash-fill');
            } else {
                icon.classList.remove('bi-eye-slash-fill');
                icon.classList.add('bi-eye-fill');
            }
        });
    });
  
    const body = document.body;
    const modeToggle = document.getElementById('modeToggle');
    const mysqlToggle = document.getElementById('mysqlToggle');
    const postgresqlToggle = document.getElementById('postgresqlToggle');
    const databaseConnection = document.querySelector('.database-connection');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.querySelector('.sidebar');
  
    // Dark/Light mode toggle
    modeToggle.addEventListener('change', function() {
        body.classList.toggle('dark-mode');
        body.classList.toggle('light-mode');
    });
  
    // Toggle form visibility based on checkboxes
    function toggleFormVisibility() {
        if (mysqlToggle.checked || postgresqlToggle.checked) {
            databaseConnection.style.display = 'block';
        } else {
            databaseConnection.style.display = 'none';
        }
    }
  
    mysqlToggle.addEventListener('change', function() {
        if (this.checked) {
            postgresqlToggle.checked = false;
        }
        toggleFormVisibility();
    });
  
    postgresqlToggle.addEventListener('change', function() {
        if (this.checked) {
            mysqlToggle.checked = false;
        }
        toggleFormVisibility();
    });
    toggleFormVisibility();
  });
  document.getElementById('sidebarToggle').addEventListener('click', function() {
    document.querySelector('.sidebar').classList.toggle('show-sidebar');
  });
  