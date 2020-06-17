exports.user = (sequelize, Sequelize) => {

    var User = sequelize.define("user", {
        iduser: {
            type : Sequelize.INTEGER, 
            primaryKey: true,
            autoIncrement: true
        },
        email: { type: Sequelize.STRING },
        nom: { type: Sequelize.STRING },
        prenom: { type: Sequelize.STRING },
        userlocation: { type: Sequelize.INTEGER},
        userphoto: { type: Sequelize.STRING},
        pw: { type: Sequelize.STRING}
    }, 
    {
        timestamps: false,
    });

    return User;
};