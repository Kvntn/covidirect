var user = require('./user.model');

exports.ad = (sequelize, Sequelize) => {

    var ad = sequelize.define("ad", {
        idad: {
            type: Sequelize.INTEGER,
            primaryKey: true,
            autoIncrement: true
        },
        statut: { type: Sequelize.STRING },
        title: { type: Sequelize.STRING },
        decsriptionad: { type: Sequelize.STRING },
        datead: { type: Sequelize.STRING },
        expirationdate: { type: Sequelize.STRING },
        typead: { type: Sequelize.STRING }
    }, {
        timestamps: false,
    });

    return ad;
};