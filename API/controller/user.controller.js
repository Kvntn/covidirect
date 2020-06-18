var db = require("../models");
var Users = db.Users;
var Op = db.Sequelize.Op;
var md5 = require('md5');

// Create and Save a new user
exports.create = (req, res) => {
    // Validate request
<<<<<<< HEAD
    if (!req.body.nom || !req.body.firstname || !req.body.pw || !req.body.email || !req.body.userlocation) {
=======
    if (!req.body.nom || !req.body.prenom || !req.body.pw || !req.body.email || !req.body.userlocation) {
>>>>>>> API
        res.status(400).send({
            message: `Missing parameters, please fill the body with :`,
            email: 'STRING',
            nom: 'STRING',
            prenom: 'STRING',
            userlocation: 'INTEGER',
            pw: 'STRING'
    });
        return;
    }

    // Creates a user
    var user = {
        email: req.body.email,
        nom: req.body.nom,
<<<<<<< HEAD
=======
        prenom: req.body.firstname,
>>>>>>> API
        userphoto: req.body.userphoto ? req.body.userphoto : false,
        userlocation: req.body.userlocation,
        pw: md5(req.body.pw)
    };

    // Save user in the database
    Users.create(user)
        .then(data => {
            res.send(data);
        })
        .catch(err => {
            res.status(500).send({
                message: err.message || "Some error occurred while creating the user."
            });
        });
};

exports.findEmail = (req, res) => {
    var email = req.query.email;
    var condition = email ? {
        email: {
            [Op.like]: `%${email}%`
        }
    } : null;

    Users.findAll({
            where: condition
        })
        .then(data => {
            res.send(data);
        })
        .catch(err => {
            res.status(500).send({
                message: err.message || "Some error occurred while retrieving email."
            });
        });
};

<<<<<<< HEAD
exports.findByLocation = (req, res) => {
=======
exports.findLocation = (req, res) => {
>>>>>>> API
    var userlocation = req.query.userlocation;
    var condition = userlocation ? {
        userlocation: {
            [Op.like]: `%${userlocation}%`
        }
    } : null;

    Users.findOne({
            where: condition
        })
        .then(data => {
            res.send(data);
        })
        .catch(err => {
            res.status(500).send({
<<<<<<< HEAD
                message: err.message || `Some error occurred while retrieving users by userlocations %${userlocation}%.`
=======
                message: err.message ||  `Some error occurred while retrieving users in %${userlocation}%.`
>>>>>>> API
            });
        });
};


// Find a single user with an id
<<<<<<< HEAD
exports.findName = (req, res) => {
    var nom = req.query.nom;
    var condition = nom ? {
        nom: {
            [Op.like]: `%${nom}%`
        }
    } : null;

    Users.findOne({
            where: condition
        })
        .then(data => {
            res.send(data);
        })
        .catch(err => {
            res.status(500).send({
                message: err.message || `Some error occurred while retrieving user with firstname %${nom}%.`
            });
        });
};

exports.findFirstname = (req, res) => {
    var prenom = req.query.firstname;
=======
exports.findFirstname = (req, res) => {
    var prenom = req.query.prenom;
>>>>>>> API
    var condition = prenom ? {
        prenom: {
            [Op.like]: `%${prenom}%`
        }
    } : null;

    Users.findOne({
            where: condition
        })
        .then(data => {
            res.send(data);
        })
        .catch(err => {
            res.status(500).send({
                message: err.message || `Some error occurred while retrieving user with firstname %${prenom}%.`
            });
        });
};

// Update a user by the id in the request
exports.update = (req, res) => {

};

// Delete a user with the specified id in the request
exports.delete = (req, res) => {

};

// Delete all users from the database.
exports.deleteAll = (req, res) => {

};

// Find all published users
exports.findAllPublished = (req, res) => {

};
