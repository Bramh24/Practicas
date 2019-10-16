const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

mix.styles([
		'resources/plugins/jquery-ui/jquery-ui.min.css',
		'resources/plugins/fontawesome-free/css/all.min.css',
		'resources/plugins/fontawesome-free/css/fontawesome.min.css',
		'resources/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
		'resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
		'resources/plugins/jqvmap/jqvmap.min.css',
		'resources/dist/css/adminlte.min.css',
		'resources/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
		'resources/plugins/daterangepicker/daterangepicker.css',
		'resources/plugins/summernote/summernote-bs4.css'
	], 'public/css/plantilla.css')

	.scripts([
			'resources/plugins/jquery/jquery.min.js',
			'resources/plugins/bootstrap/js/bootstrap.bundle.min.js',
			'resources/plugins/jquery-ui/jquery-ui.min.js',
			'resources/plugins/chart.js/Chart.min.js',
			'resources/plugins/sparklines/sparkline.js',
			'resources/plugins/jqvmap/jquery.vmap.min.js',
			'resources/plugins/jqvmap/maps/jquery.vmap.world.js',
			'resources/plugins/jquery-knob/jquery.knob.min.js',
			'resources/plugins/moment/moment.min.js',
			'resources/plugins/daterangepicker/daterangepicker.js',
			'resources/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
			'resources/plugins/summernote/summernote-bs4.min.js',
			'resources/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
			'resources/dist/js/adminlte.js',
			'resources/dist/js/pages/dashboard.js',
			'resources/dist/js/demo.js'
		], 'public/js/plantilla.js');