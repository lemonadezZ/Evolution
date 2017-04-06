var gulp = require('gulp');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var cssmin = require('gulp-minify-css');

gulp.task('default',['style','script'],function () {
});

gulp.task('script', function() {
    gulp.src([
        'public/assets/global/plugins/respond.min.js',
        'public/assets/global/plugins/excanvas.min.js',
        'public/assets/global/plugins/jquery.min.js',
       "public/bower_components/jquery-pjax/jquery.pjax.js",
           "public/assets/global/plugins/bootstrap/js/bootstrap.min.js",
           "public/assets/global/plugins/js.cookie.min.js",
           "public/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js",
           "public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js",
           "public/assets/global/plugins/jquery.blockui.min.js",
           "public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js",
           "public/assets/global/scripts/app.min.js",
           "public/assets/global/scripts/datatable.js",
           "public/assets/global/plugins/datatables/datatables.min.js",
           "public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js",
           "public/assets/layouts/layout2/scripts/layout.min.js",
           "public/assets/layouts/layout2/scripts/demo.min.js",
           "public/assets/layouts/global/scripts/quick-sidebar.min.js",
            "bower_components/jquery-ujs/src/rails.js"
    ])
        .pipe(uglify())
        .pipe(concat('main.js'))
        .pipe(gulp.dest('public/js'))
});
gulp.task('style', function() {
    gulp.src([
        "public/assets/global/plugins/font-awesome/css/font-awesome.min.css",
       "public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" ,
       "public/assets/global/plugins/bootstrap/css/bootstrap.min.css" ,
       "public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" ,
       "public/assets/global/css/components.min.css",
       "public/assets/global/css/plugins.min.css" ,
       "public/assets/layouts/layout2/css/layout.min.css" ,
       "public/assets/layouts/layout2/css/themes/blue.min.css",
       "public/assets/layouts/layout2/css/custom.min.css" ,
       "public/assets/global/plugins/datatables/datatables.min.css" ,
       "public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css"
    ])
        .pipe(cssmin())
        .pipe(concat('main.css'))
        .pipe(gulp.dest('public/css'))
});