     document.addEventListener("DOMContentLoaded", function() {
         const toggleBtn = document.querySelector('.fusion-icon.awb-icon-bars');
         const mobileNav = document.querySelector('.fusion-mobile-nav-holder');

         if (toggleBtn && mobileNav) {
             toggleBtn.addEventListener('click', function(e) {
                 e.preventDefault();
                 const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';

                 toggleBtn.setAttribute('aria-expanded', !isExpanded);
                 mobileNav.style.display = isExpanded ? 'none' : 'block';
             });
         }
     });