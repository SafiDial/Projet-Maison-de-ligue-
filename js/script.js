function filterCollaborateurs() {
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const serviceFilter = document.getElementById('serviceFilter').value;
    const villeFilter = document.getElementById('villeFilter').value;
    const collaborateurs = document.querySelectorAll('.collaborateur');

    collaborateurs.forEach(collaborateur => {
        const name = collaborateur.querySelector('.collaborateur-info p:nth-child(1)').textContent.toLowerCase();
        const service = collaborateur.querySelector('.collaborateur-info p:nth-child(2)').textContent.split(': ')[1];
        const ville = collaborateur.querySelector('.collaborateur-info p:nth-child(3)').textContent.split(': ')[1];

        const nameMatch = name.includes(searchInput);
        const serviceMatch = serviceFilter === '' || service === serviceFilter;
        const villeMatch = villeFilter === '' || ville === villeFilter;

        if (nameMatch && serviceMatch && villeMatch) {
            collaborateur.style.display = 'block';
        } else {
            collaborateur.style.display = 'none';
        }
    });
}