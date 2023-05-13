const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

module.exports = {
	...defaultConfig,
	entry: {
		main: './src/assets/js/index.js',
		adminStyles: './src/assets/scss/admin.scss',
	}
};
