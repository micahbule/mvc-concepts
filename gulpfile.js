var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
elixir.config.js.browserify.transformers.push({
    name: 'babelify',
    options: {}
});

elixir(function(mix) {
    mix.less('app.less');
});

elixir(function(mix) {
	mix.browserify('app.js');
});

elixir(function(mix) {
	mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.min.js');
	mix.copy('node_modules/datatables.net/js/jquery.dataTables.js', 'public/js/jquery.dataTables.js');
	mix.copy('node_modules/datatables.net-bs/js/dataTables.bootstrap.js', 'public/js/dataTables.bootstrap.js');
	mix.copy('node_modules/datatables.net-bs/css/dataTables.bootstrap.css', 'public/css/dataTables.bootstrap.css');
	mix.copy('node_modules/bootstrap/fonts', 'public/fonts');
});

elixir(function(mix) {
    mix.browserSync({
    	proxy: 'localhost:8000'
    });
});