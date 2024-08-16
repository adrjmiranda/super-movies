const path = require('path');
const glob = require('glob');
const fs = require('fs');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
	mode: 'development',
	entry: () => {
		const entries = {};

		glob.sync('./app/src/js/**/*.ts').forEach((file) => {
			const name = path.relative('./app/src/js', file).replace(/\.ts$/, '');
			entries[`js/${name}`] = `./${file}`;
		});

		glob.sync('./app/src/scss/**/*.scss').forEach((file) => {
			const name = path.relative('./app/src/scss', file).replace(/\.scss$/, '');
			entries[`css/${name}`] = `./${file}`;
		});

		return entries;
	},
	module: {
		rules: [
			{
				test: /\.tsx?$/,
				use: 'ts-loader',
				exclude: /node_modules/,
			},
			{
				test: /\.scss$/,
				use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader'],
				exclude: /node_modules/,
			},
		],
	},
	resolve: {
		extensions: ['.tsx', '.ts', '.js'],
	},
	output: {
		filename: '[name].js',
		path: path.resolve(__dirname, 'public/assets'),
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: '[name].css',
		}),
		{
			apply: (compiler) => {
				compiler.hooks.afterEmit.tap('RemoveJsFromCssFolder', (compilation) => {
					Object.keys(compilation.assets).forEach((filename) => {
						if (filename.startsWith('css/') && filename.endsWith('.js')) {
							const filePath = path.resolve(
								compiler.options.output.path,
								filename
							);

							if (fs.existsSync(filePath)) {
								fs.unlinkSync(filePath);
							}
						}
					});
				});
			},
		},
	],
};
