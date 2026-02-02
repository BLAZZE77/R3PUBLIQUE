(function () {
    const STORAGE_KEY = 'polildle_' + new Date().toISOString().slice(0, 10);
    const input = document.getElementById('search-input');
    const dropdown = document.getElementById('autocomplete-dropdown');
    const resultsBody = document.getElementById('results-body');
    const victoryMessage = document.getElementById('victory-message');
    const guessCountEl = document.getElementById('guess-count');

    let guesses = JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]');
    let won = false;
    let debounceTimer = null;
    let guessedNames = new Set();

    // Restore previous guesses
    guesses.forEach(function (g) {
        guessedNames.add(g.nom);
        renderRow(g);
        if (g.isCorrect) won = true;
    });
    if (won) showVictory();

    // Autocomplete
    input.addEventListener('input', function () {
        clearTimeout(debounceTimer);
        const q = input.value.trim();
        if (q.length < 2) {
            dropdown.classList.remove('active');
            return;
        }
        debounceTimer = setTimeout(function () {
            fetch('/polildle/search?q=' + encodeURIComponent(q))
                .then(function (r) { return r.json(); })
                .then(function (data) {
                    dropdown.innerHTML = '';
                    var filtered = data.filter(function (d) { return !guessedNames.has(d.nom); });
                    if (filtered.length === 0) {
                        dropdown.classList.remove('active');
                        return;
                    }
                    filtered.forEach(function (item) {
                        var div = document.createElement('div');
                        div.className = 'autocomplete-item';
                        div.textContent = item.nom;
                        div.addEventListener('click', function () {
                            submitGuess(item.nom);
                        });
                        dropdown.appendChild(div);
                    });
                    dropdown.classList.add('active');
                });
        }, 250);
    });

    // Close dropdown on outside click
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.search-wrapper')) {
            dropdown.classList.remove('active');
        }
    });

    // Enter key
    input.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            var firstItem = dropdown.querySelector('.autocomplete-item');
            if (firstItem) {
                submitGuess(firstItem.textContent);
            }
        }
    });

    function submitGuess(nom) {
        if (won || guessedNames.has(nom)) return;

        dropdown.classList.remove('active');
        input.value = '';

        fetch('/polildle/guess', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ nom: nom })
        })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (data.error) return;

                guessedNames.add(data.nom);
                guesses.push(data);
                localStorage.setItem(STORAGE_KEY, JSON.stringify(guesses));

                renderRow(data);

                if (data.isCorrect) {
                    won = true;
                    showVictory();
                }
            });
    }

    function renderRow(data) {
        var row = document.createElement('div');
        row.className = 'result-row';

        // Nom
        row.appendChild(makeCell(data.nom, 'name-cell'));

        // Parti
        row.appendChild(makeCell(data.parti.value, data.parti.status));

        // Fonction
        row.appendChild(makeCell(data.fonction.value, data.fonction.status));

        // Bord
        row.appendChild(makeCell(data.bord.value, data.bord.status));

        // Année
        var anneeText = data.anneeDebut.value.toString();
        if (data.anneeDebut.direction === 'up') anneeText += ' ↑';
        if (data.anneeDebut.direction === 'down') anneeText += ' ↓';
        row.appendChild(makeCell(anneeText, data.anneeDebut.status));

        // Genre
        row.appendChild(makeCell(data.genre.value, data.genre.status));

        // République
        row.appendChild(makeCell(data.republique.value, data.republique.status));

        resultsBody.prepend(row);
    }

    function makeCell(text, status) {
        var div = document.createElement('div');
        div.className = 'cell ' + status;
        div.textContent = text;
        return div;
    }

    function showVictory() {
        guessCountEl.textContent = guesses.length;
        victoryMessage.style.display = 'block';
        input.disabled = true;
    }
})();
