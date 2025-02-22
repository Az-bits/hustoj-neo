const mix = require('laravel-mix');
const path = require('path');

mix.disableNotifications();

mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.(woff2?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
                type: 'asset/resource',
                generator: {
                    filename: 'fonts/[name][ext]'
                }
            }
        ]
    },
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/assets/js')
        }
    }
});

// Asegúrate de que processCssUrls esté en false
mix.options({
    processCssUrls: false
});

mix.js('resources/assets/js/app.js', 'public/admin/js')
   .vue({ version: 2 })
   .sass('resources/assets/sass/admin.scss', 'public/css')
   .extract(['vue', 'vue-router', 'vue-bus', 'element-ui', 'axios', 'lodash',
        'jquery', 'echarts', 'vue-cookie']);
