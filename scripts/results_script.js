$(document).ready(function() {
    function debounce(func, wait) {
        let timeout;
        return function(...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
    }

    function search(query) {
        $.get('/search', { query: query }, function(data) {
            var tbody = $('#results-table tbody');
            tbody.empty();

            // Clear previous table headers
            $('#results-table thead tr').empty();

            if (data.length > 0) {
                // Determine columns dynamically based on first result
                var columns = Object.keys(data[0]);
                var thead = $('#results-table thead tr');

                columns.forEach(function(col) {
                    thead.append($('<th>').text(col));
                });

                data.forEach(function(row) {
                    var tr = $('<tr>');
                    columns.forEach(function(col) {
                        tr.append($('<td>').text(row[col]));
                    });
                    tbody.append(tr);
                });
            }
        });
    }

    // Get initial query from URL and perform initial search
    var initialQuery = new URLSearchParams(window.location.search).get('query');
    if (initialQuery) {
        $('#live-search-bar').val(initialQuery);
        search(initialQuery);
        $('#live-search-bar').focus();
    }

    $('#live-search-bar').on('input', function() {
        var query = $(this).val();
        if (query.length > 0) {
            search(query);
            // Update the URL with the new query
            var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?query=' + encodeURIComponent(query);
            window.history.pushState({ path: newUrl }, '', newUrl);
        } else {
            // Redirect to index.html if the search bar is empty
            window.location.href = '../index.html';
        }
    });
});
