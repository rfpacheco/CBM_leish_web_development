$(document).ready(function() {
    function search(query) {
        $.get('/search', { query: query }, function(data) {
            var tbody = $('#results-table tbody');
            tbody.empty();
            data.forEach(function(row) {
                var tr = $('<tr>');
                tr.append($('<td>').text(row.id));
                tr.append($('<td>').text(row.cdsid));
                tr.append($('<td>').text(row.ortholog));
                tr.append($('<td>').text(row.associatedfunction));
                tbody.append(tr);
            });
        });
    }

    // Get initial query from URL and perform initial search
    var initialQuery = new URLSearchParams(window.location.search).get('query');
    if (initialQuery) {
        $('#live-search-bar').val(initialQuery);
        search(initialQuery);
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
