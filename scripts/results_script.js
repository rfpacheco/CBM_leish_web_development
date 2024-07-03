$(document).ready(function() {
    var query = new URLSearchParams(window.location.search).get('query');
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
});
