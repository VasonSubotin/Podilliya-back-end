const Sequelize = require('sequelize');


const sequelize = new Sequelize('scrapper', 'oilmarket', '[eqgbpl;jgf', {
    host: 'localhost',
    port: '3306',
    dialect: 'mysql',
    pool: {
        max: 100,
        min: 0,
        acquire: 30000,
        idle: 10000
      }
  });

module.exports = { sequelize };