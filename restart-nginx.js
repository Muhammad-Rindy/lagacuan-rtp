const { exec } = require("child_process");

const express = require('express');
const app = express();
const port = 9000;

app.get('/', (req, res) => {
    exec('sudo systemctl restart nginx.service');
    res.json({status: true});
})

app.listen(port);
