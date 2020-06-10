var express = require("express");
var bodyParser = require("body-parser");
var cors = require("cors");
var db = require("./app/models");

var app = express();

var corsOptions = {
    origin: "http://localhost:8081"
};

app.use(cors(corsOptions));

// parse requests of content-type - application/json
app.use(bodyParser.json());

// parse requests of content-type - application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({
    extended: true
}));

// simple route
app.get("/", (req, res) => {
    res.json({
        message: "Welcome to CoviDirect API gate."
    });
});

// set port, listen for requests
var PORT = process.env.PORT || 8080;
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}.`);
});


db.sequelize.sync();