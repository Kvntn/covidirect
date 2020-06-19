var db = require("../models");
var Users = db.Users;
var Op = db.Sequelize.Op;
var md5 = require('md5');
var url = require("url");
var qs = require('querystring');

var _target, _targetName, _function;

var request_error = 
{
    url: `In order to complete a request, you should create a correct URL with :`,
    url_structure: `https://api-covidirect.ew.r.appspot.com/:target/:function`,
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

    var urlParts = [];
    url.parse(req.originalUrl, true).path.split('/').forEach(part => {
        if (part != '') urlParts.push(part);
    });

    if (urlParts) {
        if(urlParts[0] == 'user') {
            var _target = db.Users;
            var _targetName = 'user';
        };
        var _function = urlParts[1];
    };

    console.log(req.get('host') + req.originalUrl);
    console.log(_target, _function, req.body);

    // Creates a user
    if (_targetName == "user") {

        // Validate request body for user
        if (!req.body.nom || !req.body.prenom || !req.body.pw || !req.body.email || !req.body.userlocation || !urlParts) {
            res.status(400).send(request_error); 
        };

        var target_model = {
            email: req.body.email,
            nom: req.body.nom,
            prenom: req.body.prenom,
            userphoto: req.body.userphoto ? req.body.userphoto : false,
            userlocation: req.body.userlocation,
            pw: md5(req.body.pw)
        };
    }

    
    // Creates an ad
    else if (_targetName == "ad") {

        if (!req.body.nom || !req.body.prenom || !req.body.pw || !req.body.email || !req.body.userlocation || !urlParts) {
            res.status(400).send(request_error);
        };

        var target_model = {
            email: req.body.email,
            nom: req.body.nom,
            userphoto: req.body.userphoto ? req.body.userphoto : false,
            userlocation: req.body.userlocation,
            pw: md5(req.body.pw)
        };
    }

    var success = {
        "msg": `Successfully used function --${_function}-- on  --${_targetName}-- table`,
        "parameters": req.body
    };

    if (_function === "create") {
        _target.create(target_model)
            .then(() => {
                res.send(success);
            })
            .catch(err => {
                console.log(err);
                res.status(500).send({
                    message: 'ERROR WHILE EXECUTING REQUEST "CREATE", CHECK YOUR CONNECTION, OR CONTACT THE ADMINISTRATOR',
                    help: request_error
                });
            });
    };

    if (_function === "findAll") {
        var email = req.query.email;
        var condition = email ? {
            email: {
                [Op.like]: `%${email}%`
            }
        } : null;

        _target.findAll({
                where: condition
            })
            .then(() => {
                res.send(success);
            })
            .catch(err => {
                Console.log(err);
                res.status(500).send({
                    message: err.message || "Some error occurred while retrieving email."
                });
            });
    };
};
