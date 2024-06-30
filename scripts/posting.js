document.addEventListener("DOMContentLoaded", function() {
    fetch('./data/posts.json')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(posts => {
            const centerColumn = document.querySelector('.center-column');

            posts.forEach(post => {
                const postDiv = document.createElement('div');
                postDiv.classList.add('post');

                const postTitle = document.createElement('h3');
                postTitle.textContent = post.title;

                const postDescription = document.createElement('p');
                postDescription.textContent = post.description;

                postDiv.appendChild(postTitle);
                postDiv.appendChild(postDescription);

                centerColumn.appendChild(postDiv);
            });
        })
        .catch(error => console.error('Error loading posts:', error));
});
