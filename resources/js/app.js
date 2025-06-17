//********************* Menu burgerb **********************/

const burger = document.getElementById('burger');
const navLinks = document.getElementById('nav-links');

burger.addEventListener('click', () => {
    burger.classList.toggle('active');
    navLinks.classList.toggle('active');
});


//*********************  Fonction pour filtrer les collaborateurs **********************/


document.addEventListener('DOMContentLoaded', function () {
    const filterName = document.getElementById('filterName');
    const filterService = document.getElementById('filterService');
    const filterCountry = document.getElementById('filterCountry');
    const collaborateursGrid = document.getElementById('collaborateursGrid');
    const collaborateurs = Array.from(collaborateursGrid.getElementsByClassName('collaborateur'));

    //***** Fonction pour filtrer les collaborateurs
    function filterCollaborators() {
        const nameValue = filterName.value.toLowerCase();
        const serviceValue = filterService.value.toLowerCase();
        const countryValue = filterCountry.value.toLowerCase();

         //***** Vérifie si tous les filtres sont vides
        const allFiltersEmpty = !nameValue && !serviceValue && !countryValue;

        collaborateurs.forEach(collaborateur => {
            const name = collaborateur.querySelector('.collaborateur-info p:nth-child(1)').textContent.toLowerCase();
            const service = collaborateur.querySelector('.collaborateur-info p:nth-child(2)').textContent.toLowerCase();
            const country = collaborateur.querySelector('.collaborateur-info p:nth-child(4)').textContent.toLowerCase();

              //***** Si tous les filtres sont vides, réafficher tous les collaborateurs
            if (allFiltersEmpty || (name.includes(nameValue) && service.includes(serviceValue) && country.includes(countryValue))) {
                collaborateur.classList.remove('hidden');
            } else {
                collaborateur.classList.add('hidden');
            }
        });
    }

    filterName.addEventListener('input', filterCollaborators);
    filterService.addEventListener('input', filterCollaborators);
    filterCountry.addEventListener('input', filterCollaborators);
});



















