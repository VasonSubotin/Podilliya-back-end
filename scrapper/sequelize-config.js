const Sequelize = require('sequelize');


// DB_DATABASE=scrapper
// DB_USERNAME=root
// DB_PASSWORD=my-secret-pw
const sequelize = new Sequelize('oilmarket', 'oilmarket', '[eqgbplf;jgf', {
    host: 'localhost',
    port: '33066',
    dialect: 'mysql',
    pool: {
        max: 100,
        min: 0,
        acquire: 30000,
        idle: 10000
      }
  });

module.exports = { sequelize };