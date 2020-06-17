var db = require("../models");
var Users = db.Users;
var Op = db.Sequelize.Op;
var md5 = require('md5');
var qs = require('querystring');

var request_error = 
{
    url: `In order to complete a request, you should create a correct URL with :`,
    url_structure: `http://34.65.152.48/:target/:function`,
    url_target: `user, ad`,
    url_function: `CRUD, find`,
    body: `For the arguments, please fill the body with :`,
    body_structure: {
        email: 'STRING',
        nom: 'STRING',
        prenom: 'STRING',
        userlocation: 'INTEGER',
        pw: 'STRING'
    }
}
exports.master = (req, res) => {

    console.log(req.get('host'), req.originalUrl);
    let tmp = qs.parse(req.originalUrl, '/');
    if (tmp != null) {
        var _target = temp[0];
        var _function = temp[1];
    };

    // Validate request
    if (!req.body.nom || !req.body.firstname || !req.body.pw || !req.body.email || !req.body.userlocation || !tmp) {
        res.status(400).send(request_error); 
    }

    
    // Creates a user
    if (_target == 'user') {
        var target_model = {
            email: req.body.email,
            nom: req.body.nom,
            userphoto: req.body.userphoto ? req.body.userphoto : false,
            userlocation: req.body.userlocation,
            pw: md5(req.body.pw)
        };
    }
    // Creates a user
    else if (_target == 'ad') {
        var target_model = {
            email: req.body.email,
            nom: req.body.nom,
            userphoto: req.body.userphoto ? req.body.userphoto : false,
            userlocation: req.body.userlocation,
            pw: md5(req.body.pw)
        };
    }

    _target.create(target_model)
        .then(data => {
            res.send(data);
        })
        .catch(err => {
            res.status(500).send({
                message: 'ERROR WHILE EXECUTING REQUEST "CREATE", CHECK YOUR CONNECTION, OR CONTACT THE ADMINISTRATOR',
                default: request_error
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
