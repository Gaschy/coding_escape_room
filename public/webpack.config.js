var BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
const webpack = require('webpack');
const path = require('path');
const VueLoaderPlugin = require('vue-loader/lib/plugin');

module.exports = (env, argv) => {
    optimization =
    {
        splitChunks: {
            chunks: "all"
        },
        minimize: false
    };

    let plugins = [
        new VueLoaderPlugin()
        //new BundleAnalyzerPlugin()
    ];
    let watch = false;
    if (process.env.NODE_ENV === 'production' || process.env.NODE_ENV === 'testing') {
        plugins = plugins.concat([
            new webpack.DefinePlugin({
                'process.env': {
                    NODE_ENV: '"production"'
                }
            }),
            new webpack.LoaderOptionsPlugin({
                minimize: true
            })
        ]);
        optimization.minimize = true;
    } else if (process.env.NODE_ENV === 'testing') {
        plugins = plugins.concat([
            new webpack.DefinePlugin({
                'process.env': {
                    NODE_ENV: '"testing"'
                }
            }),
            new webpack.LoaderOptionsPlugin({
                minimize: true
            })
        ]);
        optimization.minimize = true;
    } else {
        watch = true;
    }

    return {
        module: {
            rules: [
                {
                    test: /\.vue$/,
                    loader: 'vue-loader',
                    options: {
                        loaders: {}
                    }
                },
                {
                    test: /\.tsx?$/,
                    include: [
                        path.resolve(__dirname, 'src')
                    ],
                    use: [{
                        loader: 'babel-loader',
                        options: {
                            plugins: ["transform-class-properties"],
                            presets: [
                                "@babel/typescript",
                                '@babel/preset-env'
                            ]
                        }
                    }]
                },
                {
                    test: /\.js$/,
                    include: [
                        path.resolve(__dirname, 'src'),
                        path.resolve(__dirname, 'node_modules'),
                    ],
                    use: [{
                        loader: 'babel-loader',
                        options: {
                            presets: [
                                '@babel/preset-env'
                            ]
                        }
                    }]
                },
                {
                    test: /\.(scss)$/,
                    use: [{
                            loader: "style-loader" // translates CSS into CommonJS
                        }, {
                            loader: "css-loader" // translates CSS into CommonJS
                        }, {
                            loader: "postcss-loader"
                        },{
                            loader: "sass-loader" // compiles Sass to CSS
                        }]
                },
                {
                    test: /\.(css)$/,
                    use: [{
                            loader: "style-loader" // translates CSS into CommonJS
                        }, {
                            loader: "css-loader" // translates CSS into CommonJS
                        },{
                            loader: "postcss-loader"
                        }]
                },
                {
                    test: /\.(woff2?|ttf|eot|svg|png|jpg|gif)(\?v=\d+\.\d+\.\d+)?$/,
                    loader: "url-loader"
                }
            ]
        },
        plugins: plugins,
        resolve: {
            alias: {
                'vue$': 'vue/dist/vue.esm.js'
            },
            modules: [
                path.resolve(__dirname, 'src/js'),
                'node_modules'
            ],
            extensions: ['*', '.ts', '.js', '.vue', '.json']
        },
        optimization: optimization,
        watch: watch,
        devtool: process.env.NODE_ENV === 'production' ? "" : 'source-map'
    };
};
