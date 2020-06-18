module.exports = {
    HOST: "35.204.245.68",
    USER: "admin",
    PASSWORD: "420",
    DB: "covidirect",
    dialect: "mysql",
    pool: {
        max: 50,
        min: 0,
        acquire: 30000,
        idle: 10000
    }
};