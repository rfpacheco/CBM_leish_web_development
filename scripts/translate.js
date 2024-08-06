document.addEventListener('DOMContentLoaded', () => {
    const languageDropdown = document.getElementById('language-dropdown');
    const selectedFlag = document.getElementById('selected-flag');

    // Function to change language
    const changeLanguage = (lang) => {
        localStorage.setItem('selectedLanguage', lang);
        loadLanguage(lang);
    };

    // Function to load language
    const loadLanguage = (lang) => {
        fetch(`./data/lang/${lang}.json`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('lang_genome_decoding').textContent = data.genome_decoding;
                document.getElementById('lang_about_us').textContent = data.about_us;
                document.getElementById('lang_species').textContent = data.species;
                document.getElementById('lang_downloads').textContent = data.downloads;
            })
            .catch(error => console.error('Error loading language:', error));
        
        // Change flag
        const flagSrc = languageDropdown.querySelector(`option[value="${lang}"]`).dataset.flag;
        selectedFlag.src = flagSrc;
    };

    // Load language from localStorage if exists
    const savedLanguage = localStorage.getItem('selectedLanguage') || 'eng';
    languageDropdown.value = savedLanguage;
    loadLanguage(savedLanguage);

    // Event listener for language change
    languageDropdown.addEventListener('change', (event) => {
        changeLanguage(event.target.value);
    });
})