document.addEventListener("DOMContentLoaded", function() {
    const postsContainer = document.getElementById('posts-container');

    fetch('./data/posts.json')
        .then(response => response.json())
        .then(posts => {
            posts.forEach(post => {
                const postDiv = document.createElement('div');
                postDiv.classList.add('post');
                postDiv.setAttribute('data-tags', post.tags.join(','));
                postDiv.setAttribute('data-date', post.date);

                const postTitle = document.createElement('h3');
                postTitle.textContent = post.title;

                const postDescription = document.createElement('p');
                postDescription.textContent = post.description;

                const postTags = document.createElement('p');
                postTags.textContent = 'Tags: ' + post.tags.join(', ');

                const postDate = document.createElement('p');
                postDate.textContent = 'Date: ' + post.date;

                postDiv.appendChild(postTitle);
                postDiv.appendChild(postDescription);
                postDiv.appendChild(postTags);
                postDiv.appendChild(postDate);

                postsContainer.appendChild(postDiv);
            });

            // Add event listeners for filtering
            // Add event listeners for filtering and sorting
            const checkboxes = document.querySelectorAll('.filters .opt-in');
            const startDateInput = document.getElementById('start-date');
            const endDateInput = document.getElementById('end-date');
            const sortOrderSelect = document.getElementById('sort-order');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', filterAndSortPosts);
            });

            startDateInput.addEventListener('change', filterAndSortPosts);
            endDateInput.addEventListener('change', filterAndSortPosts);
            sortOrderSelect.addEventListener('change', filterAndSortPosts);

            function filterAndSortPosts() {
                const selectedTags = Array.from(checkboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);
                const startDate = startDateInput.value;
                const endDate = endDateInput.value;
                const sortOrder = sortOrderSelect.value;

                const postsElements = Array.from(document.querySelectorAll('.post'));

                postsElements.forEach(post => {
                    const postTags = post.getAttribute('data-tags').split(',');
                    const postDate = post.getAttribute('data-date');

                    const tagMatch = selectedTags.length === 0 || selectedTags.every(tag => postTags.includes(tag));
                    const dateMatch = (!startDate || postDate >= startDate) && (!endDate || postDate <= endDate);

                    if (tagMatch && dateMatch) {
                        post.style.display = 'block';
                    } else {
                        post.style.display = 'none';
                    }
                });

                postsElements.sort((a, b) => {
                    const dateA = new Date(a.getAttribute('data-date'));
                    const dateB = new Date(b.getAttribute('data-date'));
                    return sortOrder === 'newest' ? dateB - dateA : dateA - dateB;
                });

                postsElements.forEach(post => postsContainer.appendChild(post));
            }
        })
        .catch(error => console.error('Error loading posts:', error));
});