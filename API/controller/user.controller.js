var db = require("../models");
var Users = db.Users;
var Op = db.Sequelize.Op;
var md5 = require('md5');

// Create and Save a new user
exports.create = (req, res) => {
    // Validate request
    if (!req.body.nom || !req.body.prenom || !req.body.pw || !req.body.email || !req.body.userlocation) {
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
        prenom: req.body.firstname,
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

exports.findLocation = (req, res) => {
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
                message: err.message ||  `Some error occurred while retrieving users in %${userlocation}%.`
            });
        });
};


// Find a single user with an id
exports.findFirstname = (req, res) => {
    var prenom = req.query.prenom;
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
