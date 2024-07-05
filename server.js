const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');
const path = require('path');

const app = express();

// Set up MySQL connection
const db = mysql.createConnection({
    host: 'localhost',
    user: 'leish',
    password: 'Leishmania_1',
    database: 'Leishmania'
});

db.connect((err) => {
    if (err) {
        throw err;
    }
    console.log('MySQL Connected...');
});

// Middleware
app.use(bodyParser.json());
app.use(express.static(path.join(__dirname, '.')));

// Serve HTML files from the 'html' directory
app.get('/html/results.html', (req, res) => {
    res.sendFile(path.join(__dirname, 'html', 'results.html'));
});

// Search endpoint
// Search endpoint
app.get('/search', (req, res) => {
    let query = req.query.query;
    let sql = `
        SELECT 'infantum' AS source_table, id, cdsid, ortholog, associatedfunction FROM infantum WHERE cdsid LIKE ? OR ortholog LIKE ? OR associatedfunction LIKE ?
        UNION ALL
        SELECT 'donovani' AS source_table, id, cdsid, ortholog, associatedfunction FROM donovani WHERE cdsid LIKE ? OR ortholog LIKE ? OR associatedfunction LIKE ?
        UNION ALL
        SELECT 'braziliensis' AS source_table, id, cdsid, ortholog, associatedfunction FROM braziliensis WHERE cdsid LIKE ? OR ortholog LIKE ? OR associatedfunction LIKE ?
        UNION ALL
        SELECT 'major' AS source_table, id, TranscriptID AS cdsid, NULL AS ortholog, AssociatedFunction AS associatedfunction FROM major WHERE TranscriptID LIKE ? OR cdsid LIKE ? OR AssociatedFunction LIKE ?`;

    let values = Array(12).fill(`%${query}%`);

    db.query(sql, values, (err, results) => {
        if (err) throw err;
        res.json(results);
    });
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Server started on port ${PORT}`);
});