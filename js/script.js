 // Gestion du menu burger
     const burger = document.querySelector('.burger');
     const navLinks = document.querySelector('.nav-links');

     burger.addEventListener('click', () => {
         navLinks.classList.toggle('active');
         burger.classList.toggle('active');
     });

 // Gestion du filtre

function filterCollaborateurs() {
    const searchInput = document.getElementById('searchInput').value.toLowerCase().trim();
    const serviceFilter = document.getElementById('serviceFilter').value;
    const villeFilter = document.getElementById('villeFilter').value;
    const collaborateurs = document.querySelectorAll('.collaborateur');

    collaborateurs.forEach(collaborateur => {
        const infos = collaborateur.querySelectorAll('.collaborateur-info p');
        const nom = infos[0].textContent.toLowerCase();
        const service = infos[1].textContent.split(': ')[1];
        const ville = infos[2].textContent.split(': ')[1];

        const matchNom = nom.includes(searchInput);
        const matchService = serviceFilter === '' || service === serviceFilter;
        const matchVille = villeFilter === '' || ville === villeFilter;

        collaborateur.style.display = (matchNom && matchService && matchVille) ? '' : 'none';
    });
}



function envoyerBonjour(nom) {
    alert('Bonjour ' + nom + ' !');
}