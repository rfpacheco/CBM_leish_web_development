function changeLanguage(language) {
    fetch(`./data/lang/${language}.json`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            document.querySelector('#lang_genome_decoding').innerText = data.genome_decoding;
            document.querySelector('#lang_about_us').innerText = data.about_us;
            document.querySelector('#lang_species').innerText = data.species;
            document.querySelector('#lang_downloads').innerText = data.downloads;

            // Update the flag image based on selected option
            const selectedOption = document.querySelector(`#language-dropdown option[value="${language}"]`);
            const flagSrc = selectedOption.getAttribute('data-flag');
            document.querySelector('#selected-flag').src = flagSrc;
        })
        .catch(error => console.error('Error fetching language file:', error));
}