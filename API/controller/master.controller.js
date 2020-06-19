var db = require("../models");
var Users = db.Users;
var Op = db.Sequelize.Op;
var md5 = require('md5');
var url = require("url");
var qs = require('querystring');

var request_error = 
{
    url: `In order to complete a request, you should create a correct URL with :`,
    url_structure: `http://34.105.171.41/:target/:function`,
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

    console.log(req.get('host') + req.originalUrl);
    let tmp = url.parse(req.originalUrl, true).path.split('/');
    var tab = [];
    let j = 0;
    for (let i = 0; i < tmp.length; i++) {
        if (tmp[i] != '') {
            tab[j] = tmp[i];
            j++;
        }
    }
    console.log(tab);

    if (tab) {
        if(tab[0] == 'user') {
            var _target = db.Users;
            var _targetName = 'user';
        };
        var _function = tab[1];
    };

    // Validate request
    if (!req.body.nom || !req.body.firstname || !req.body.pw || !req.body.email || !req.body.userlocation || !tmp) {
        res.status(400).send(request_error); 
    };

    console.log(_target, _function, req.body);

    // Creates a user
    if (_targetName == "user") {
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
    else if (_target == "ad") {
        var target_model = {
            email: req.body.email,
            nom: req.body.nom,
            userphoto: req.body.userphoto ? req.body.userphoto : false,
            userlocation: req.body.userlocation,
            pw: md5(req.body.pw)
        };
    }

    console.log(target_model);

    if (_function === "create") {
        _target.create(target_model)
            .then(data => {
                res.send(data);
            })
            .catch(err => {
                console.log(err);
                res.status(500).send({
                    message: 'ERROR WHILE EXECUTING REQUEST "CREATE", CHECK YOUR CONNECTION, OR CONTACT THE ADMINISTRATOR',
                    default: request_error
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
            .then(data => {
                res.send(data);
            })
            .catch(err => {
                res.status(500).send({
                    message: err.message || "Some error occurred while retrieving email."
                });
            });
    };
};