var app       = require('express');
var usrCtrl   = require('../controller/user.controller.js');
var masterCtrl = require('../controller/master.controller');
//var prodCtrl  = require('./controllers/produitsCtrl');
//var eventCtrl = require('./controllers/eventCtrl');
//var vToken      = require('../security/VerifyToken');

exports.router = (() => {
    var router = app.Router();

    //Main route
    router.route('/').post(masterCtrl.master);
    router.route('/').get(masterCtrl.master);
    router.route('/').delete(masterCtrl.master);
    router.route('/').put(masterCtrl.master);

    //User-related routes
    router.route('/usr/new').post(usrCtrl.create);
    router.route('/usr/findemail').get(usrCtrl.findEmail);
    router.route('/usr/findByLocation').get(usrCtrl.findByLocation);
    router.route('/usr/findName').get(usrCtrl.findName);
    router.route('/usr/findFirstname').get(usrCtrl.findFirstname);
    //router.route('/usr/login').post(usrCtrl.login);
/*
    //Products routes
    router.route('/produits/get').get(vToken,prodCtrl.get);
    router.route('/produits/add').post(vToken,prodCtrl.add);

    //Event routes
    router.route('/event/add').post(vToken, eventCtrl.add);
    router.route('/event/get').get(vToken, prodCtrl.get);

    //testing routes
    router.route('/test')
        .get(vToken, usrCtrl.test)
        .post(vToken, usrCtrl.test)
        .put(vToken, eventCtrl.test);
   */
    return router;
})();