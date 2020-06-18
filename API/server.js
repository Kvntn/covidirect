var express = require("express");
var bodyParser = require("body-parser");
var cors = require("cors");
var db = require("./models");
var router = require('./routes/apirouter').router;

var app = express();

var corsOptions = {
<<<<<<< HEAD
    origin: "http://localhost:8080"
=======
    origin: "http://localhost:8081"
>>>>>>> API
};

app
.use(cors(corsOptions))
.use(bodyParser.json())
.use(bodyParser.urlencoded({extended: true}))
<<<<<<< HEAD
.use(router);
=======
.use(router)
// API main gate
.get("/", (req, res) => {
    res.json({
        message: "Welcome to CoviDirect API gate."
    });
});
>>>>>>> API

// set port, listen for requests
var PORT = process.env.PORT || 8080;
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}.`);
});

db.sequelize.sync();