const Sequelize = require('sequelize');
const { sequelize } = require('./sequelize-config.js');


Sequelize.DATE.prototype._stringify = function _stringify(date, options) {
	date = this._applyTimezone(date, options);
  
	// Z here means current timezone, _not_ UTC
	// return date.format('YYYY-MM-DD HH:mm:ss.SSS Z');
	return date.format('YYYY-MM-DD HH:mm:ss.SSS');
  };


const ScrappedDataModel = sequelize.define('scrapped_data_records',
	{
		id: {
			autoIncrement: true,
			primaryKey: true,
			type: Sequelize.INTEGER
		},

		scrapped_data: {
			type: Sequelize.JSON,
			allowNull: true
		},

		created_at: {
			type: Sequelize.DATE,
			allowNull: true
        },

        updated_at: {
            type: Sequelize.DATE,
			allowNull: true
        }
        

	},
	{
		timestamps: false
	}
);

module.exports = { ScrappedDataModel };