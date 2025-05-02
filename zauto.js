// Fonction pour gérer la recherche de suggestions
function searchSuggestions() {
    const query = document.getElementById('search').value;
    if (query.length > 0) {
        fetch(`z.php?query=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                const suggestions = document.getElementById('suggestions');
                suggestions.innerHTML = '';
                data.forEach(item => {
                    const div = document.createElement('div');
                    div.textContent = item.name;
                    div.onclick = () => {
                        document.getElementById('search').value = item.name;
                        suggestions.innerHTML = '';
                    };
                    suggestions.appendChild(div);
                });
            });
    } else {
        document.getElementById('suggestions').innerHTML = '';
    }
}
    // Fonction pour rechercher des suggestions
    function searchSuggestions() {
        const query = document.getElementById('search').value;
        if (query.length > 0) {
            // Envoi d'une requête AJAX pour récupérer les suggestions
            fetch(`z.php?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    const suggestions = document.getElementById('suggestions');
                    suggestions.innerHTML = '';
                    data.forEach(item => {
                        const div = document.createElement('div');
                        div.style.display = 'flex';
                        div.style.alignItems = 'center';
                        div.style.gap = '10px';

                        // Création de l'image pour chaque suggestion
                        const img = document.createElement('img');
                        img.src = item.cover; // Supposons que la requête retourne un champ `cover` depuis la base de données
                        img.alt = item.name;
                        img.style.width = '50px';
                        img.style.height = '50px';
                        img.style.objectFit = 'cover';

                        // Création du texte pour chaque suggestion
                        const span = document.createElement('span');
                        span.textContent = item.name;

                        // Ajout de l'image et du texte dans le conteneur
                        div.appendChild(img);
                        div.appendChild(span);

                        // Gestion du clic sur une suggestion
                        div.onclick = () => {
                            document.getElementById('search').value = item.name;
                            suggestions.innerHTML = '';
                        };

                        // Ajout de la suggestion au conteneur des suggestions
                        suggestions.appendChild(div);
                    });
                });
        } else {
            // Si la barre de recherche est vide, on efface les suggestions
            document.getElementById('suggestions').innerHTML = '';
        }
    }

    // Fonction pour soumettre un formulaire simulé lors du clic sur une suggestion
    function submitFormWithSuggestion(itemName) {
        const form = document.createElement('form');
        form.method = 'GET'; // Ou 'POST' selon vos besoins
        form.action = 'fonction.php'; // Remplacez par l'URL où vous voulez envoyer les données

        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'search';
        input.value = document.getElementById('search').value;
        input.value = itemName;

        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }

    // Modification de la gestion du clic sur une suggestion
    function searchSuggestions() {
        const query = document.getElementById('search').value;
        if (query.length > 0) {
            fetch(`z.php?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    const suggestions = document.getElementById('suggestions');
                    suggestions.innerHTML = '';
                    data.forEach(item => {
                        const div = document.createElement('div');
                        div.style.display = 'flex';
                        div.style.alignItems = 'center';
                        div.style.gap = '10px';

                        const img = document.createElement('img');
                        img.src = item.cover;
                        img.alt = item.name;
                        img.style.width = '50px';
                        img.style.height = '50px';
                        img.style.objectFit = 'cover';

                        const span = document.createElement('span');
                        span.textContent = item.name;

                        div.appendChild(img);
                        div.appendChild(span);

                        div.onclick = () => {
                            submitFormWithSuggestion(item.name);
                        };

                        suggestions.appendChild(div);
                    });
                });
        } else {
            document.getElementById('suggestions').innerHTML = '';
        }
    }