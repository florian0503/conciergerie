import './styles/app.css';
import './process-animation.js';

var contactForm = document.getElementById('contact-form');
if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
        var valid = true;
        this.querySelectorAll('[required]').forEach(function(field) {
            if (field.type === 'checkbox' && !field.checked) valid = false;
            else if (field.type !== 'checkbox' && !field.value.trim()) valid = false;
        });
        var msg = document.getElementById('contact-error-msg');
        if (!valid) {
            e.preventDefault();
            msg.style.display = 'block';
        } else {
            msg.style.display = 'none';
        }
    });
}
