const dropdownTogglers = document.querySelectorAll('.dropdown-toggler');

dropdownTogglers.forEach((btn) => {

    btn.addEventListener('click', () => {

        const dropMenu = btn.nextElementSibling;
        
        dropMenu.classList.toggle('show');

    });

});