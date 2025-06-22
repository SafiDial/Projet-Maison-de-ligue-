// resources/js/filterCollaborateurs.js

document.addEventListener('DOMContentLoaded', function () {
    const nameInput = document.getElementById('nameInput');
    const serviceInput = document.getElementById('serviceInput');
    const countryInput = document.getElementById('countryInput');
    const collaborateursGrid = document.getElementById('collaborateursGrid');
    const collaborateurItems = collaborateursGrid.getElementsByClassName('collaborateur');
    const noResultsMessage = document.getElementById('noResultsMessage');

    const filterCollaborateurs = () => {
        const nameQuery = nameInput.value.toLowerCase();
        const serviceQuery = serviceInput.value.toLowerCase();
        const countryQuery = countryInput.value.toLowerCase();

        let anyVisible = false;

        Array.from(collaborateurItems).forEach(function (item) {
            const name = item.querySelector('.collaborateur-info p:first-child').textContent.toLowerCase();
            const service = item.querySelector('.collaborateur-info p:nth-child(2)').textContent.toLowerCase();
            const pays = item.querySelector('.collaborateur-info p:nth-child(3)').textContent.toLowerCase();

            const matchesName = name.includes(nameQuery);
            const matchesService = service.includes(serviceQuery);
            const matchesCountry = pays.includes(countryQuery);

            if (matchesName && matchesService && matchesCountry) {
                item.style.display = '';
                anyVisible = true;
            } else {
                item.style.display = 'none';
            }
        });

        // Afficher ou masquer le message "Aucun collaborateur disponible"
        if (anyVisible) {
            noResultsMessage.style.display = 'none';
        } else {
            noResultsMessage.style.display = 'block';
        }
    };

    nameInput.addEventListener('input', filterCollaborateurs);
    serviceInput.addEventListener('input', filterCollaborateurs);
    countryInput.addEventListener('input', filterCollaborateurs);

    // Appeler la fonction de filtrage initialement pour gérer le cas où aucun filtre n'est appliqué
    filterCollaborateurs();
});
