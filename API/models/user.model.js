module.exports = (sequelize, Sequelize) => {
    const user = sequelize.define("user", {
        title: {
            type: Sequelize.STRING
        },
        description: {
            type: Sequelize.STRING
        },
        published: {
            type: Sequelize.BOOLEAN
        }
    });

    return user;
};