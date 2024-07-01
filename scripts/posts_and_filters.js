document.addEventListener("DOMContentLoaded", function() {
    const postsContainer = document.getElementById('posts-container');

    fetch('./data/posts.json')
        .then(response => response.json())
        .then(posts => {
            posts.forEach(post => {
                const postDiv = document.createElement('div');
                postDiv.classList.add('post');
                postDiv.setAttribute('data-tags', post.tags.join(','));

                const postTitle = document.createElement('h3');
                postTitle.textContent = post.title;

                const postDescription = document.createElement('p');
                postDescription.textContent = post.description;

                const postTags = document.createElement('p');
                postTags.textContent = 'Tags: ' + post.tags.join(', ');

                postDiv.appendChild(postTitle);
                postDiv.appendChild(postDescription);
                postDiv.appendChild(postTags);

                postsContainer.appendChild(postDiv);
            });

            // Add event listeners for filtering
            const checkboxes = document.querySelectorAll('.filters .opt-in');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    const selectedTags = Array.from(checkboxes)
                        .filter(checkbox => checkbox.checked)
                        .map(checkbox => checkbox.value);

                    console.log('Selected tags:', selectedTags);  // Debugging output
                    filterPosts(selectedTags);
                });
            });

            function filterPosts(selectedTags) {
                const postsElements = document.querySelectorAll('.post');

                postsElements.forEach(post => {
                    const postTags = post.getAttribute('data-tags').split(',');
                    console.log('Post tags:', postTags);  // Debugging output

                    if (selectedTags.length === 0 || selectedTags.some(tag => postTags.includes(tag))) {
                        post.style.display = 'block';
                        console.log('Displaying post with tags:', postTags);  // Debugging output
                    } else {
                        post.style.display = 'none';
                        console.log('Hiding post with tags:', postTags);  // Debugging output
                    }
                });
            }
        })
        .catch(error => console.error('Error loading posts:', error));
});