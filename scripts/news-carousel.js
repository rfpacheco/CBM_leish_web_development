document.addEventListener('DOMContentLoaded', () => {
    // Fetch the JSON data
    fetch('./data/news.json')
        .then(response => response.json())
        .then(data => {
            const carouselContainer = document.getElementById('team-news-container');

            data.forEach(post => {
                // Create the container for each post
                const postDiv = document.createElement('div');
                postDiv.classList.add('news-post');

                    //Create a div to hold the img
                    const imgDiv = document.createElement('div');
                    imgDiv.classList.add('news-post-img');

                        // Add the img to the img div
                        const img = document.createElement('img');
                        img.src = post.img;
                        img.alt = post.title;
                        imgDiv.appendChild(img);

                    // Append the img div to the post container
                    postDiv.appendChild(imgDiv);

                    // Create and append the text container
                    const textDiv = document.createElement('div');
                    textDiv.classList.add('news-post-text');

                        // Create a div to hold the title
                        const titleDiv = document.createElement('div');
                        titleDiv.classList.add('news-post-title');

                            // Add the title
                            const title = document.createElement('h3');
                            title.textContent = post.title;
                            titleDiv.appendChild(title);
                        
                        // Append the title container to the text container
                        textDiv.appendChild(titleDiv);

                        // Add the description
                        const description = document.createElement('p');
                        description.textContent = post.description;
                        textDiv.appendChild(description);

                        // Add the date
                        const date = document.createElement('p');
                        date.textContent = post.date;
                        textDiv.appendChild(date);

                    // Append the text container to the post container
                    postDiv.appendChild(textDiv);

                // Append the post container to the carousel container
                carouselContainer.appendChild(postDiv);
            });

            showSlide(currentIndex);
            setInterval(() => changeSlide(1), 10000); // Change slide every 3 seconds
        });

    // Carousel functionality
    let currentIndex = 0;
    function showSlide(index) {
        const posts = document.querySelectorAll('#team-news-container .news-post');
        if (index >= posts.length) {
            currentIndex = 0;
        } else if (index < 0) {
            currentIndex = posts.length - 1;
        } else {
            currentIndex = index;
        }
        posts.forEach((post, i) => {
            post.style.display = i === currentIndex ? 'flex' : 'none';  // Important the FLEX option
        });
    }

    function changeSlide(n) {
        showSlide(currentIndex + n);
    }
});
