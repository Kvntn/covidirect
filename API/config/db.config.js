module.exports = {
    HOST: "35.204.245.68",
    PORT: "3306",
    USER: "kvendev",
    PASSWORD: "420",
    DB: "covidirect",
    dialect: "mysql",
    pool: {
        max: 50,
        min: 0,
        acquire: 30000,
        idle: 30000
    }
};