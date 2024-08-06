function changeLanguage(language) {
    fetch(`./data/lang/${language}.json`)
        .then(response => response.json())
        .then(data => {
            document.querySelector('#lang_genome_decoding').innerText = data.genome_decoding;
            document.querySelector('#lang_about_us').innerText = data.about_us;
            document.querySelector('#lang_species').innerText = data.species;
            document.querySelector('#lang_downloads').innerText = data.downloads;
        })
        .catch(error => console.error('Error fetching language file:', error));
}