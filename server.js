const express = require('express');
const sqlite3 = require('sqlite3').verbose();
const bodyParser = require('body-parser');
const path = require('path');

const app = express();

// Set up SQLite connection
const db = new sqlite3.Database('./data/sql/leishmania.db', (err) => {
    if (err) {
        console.error('Error opening database', err);
    } else {
        console.log('Connected to SQLite database');
    }
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
app.get('/search', (req, res) => {
    let query = req.query.query;
    let sqls = [
        { table: 'infantum', sql: 'SELECT "infantum" AS source_table, id, cdsid, ortholog, associatedfunction FROM infantum WHERE cdsid LIKE ? OR ortholog LIKE ? OR associatedfunction LIKE ?', columns: ['source_table', 'id', 'cdsid', 'ortholog', 'associatedfunction'] },
        { table: 'donovani', sql: 'SELECT "donovani" AS source_table, id, cdsid, ortholog, associatedfunction FROM donovani WHERE cdsid LIKE ? OR ortholog LIKE ? OR associatedfunction LIKE ?', columns: ['source_table', 'id', 'cdsid', 'ortholog', 'associatedfunction'] },
        { table: 'braziliensis', sql: 'SELECT "braziliensis" AS source_table, id, cdsid, ortholog, associatedfunction FROM braziliensis WHERE cdsid LIKE ? OR ortholog LIKE ? OR associatedfunction LIKE ?', columns: ['source_table', 'id', 'cdsid', 'ortholog', 'associatedfunction'] },
    ];

    let values = Array(3).fill(`%${query}%`);
    let results = [];

    sqls.forEach((sqlObj, index) => {
        db.query(sqlObj.sql, values, (err, result) => {
            if (err) throw err;
            results = results.concat(result);
            if (index === sqls.length - 1) {
                res.json(results);
            }
        });
    });
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Server started on port ${PORT}`);
});