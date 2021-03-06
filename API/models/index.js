var dbConfig = require("../config/db.config.js");
var Sequelize = require("sequelize");

var sequelize = new Sequelize(dbConfig.DB, dbConfig.USER, dbConfig.PASSWORD, {
    host: dbConfig.HOST,
    dialect: dbConfig.dialect,
    //port: dbConfig.PORT,
    pool: {
        max: dbConfig.pool.max,
        min: dbConfig.pool.min,
        acquire: dbConfig.pool.acquire,
        idle: dbConfig.pool.idle
    }
});

var db = {};

db.Sequelize = Sequelize;
db.sequelize = sequelize;

db.Users = require("./user.model.js").user(sequelize, Sequelize);
db.Ads = require("./ad.model.js").ad(sequelize, Sequelize);

db.Ads.belongsTo(db.Users, {foreignKey: 'iduser'});

module.exports = db;
