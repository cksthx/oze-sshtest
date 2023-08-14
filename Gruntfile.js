const sass = require('node-sass');

module.exports = function(grunt) {

    /**
     * Project configuration.
     */
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        paths: {
            root: 'packages/base_theme/',
            resources: '<%= paths.root %>Resources/',
            sass: 'assets/scss/',
            css: '<%= paths.resources %>Public/Css/',
            fonts: '<%= paths.resources %>Public/Fonts/',
            icons: '<%= paths.resources %>Public/Icons/',
            img: '<%= paths.resources %>Public/Images/',
            js: '<%= paths.resources %>Public/JavaScript/'
        },
        banner: '/*!\n' +
            ' * v<%= pkg.version %> (<%= pkg.homepage %>)\n' +
            ' * Copyright 2017-<%= grunt.template.today("yyyy") %> <%= pkg.author %>\n' +
            ' * Licensed under the <%= pkg.license %> license\n' +
            ' */\n',
        copy: {
            bootstrapiconsfonts: { 
                expand: true,
                src: '**',
                cwd: 'node_modules/bootstrap-icons/font/fonts/',
                dest: '<%= paths.fonts %>',

                mode: true
            },
            fonts: {
                expand: true,
                src: '**',
                cwd: 'assets/fonts/',
                dest: '<%= paths.fonts %>',

                mode: true
            },
            icons: {
                expand: true,
                src: '**',
                cwd: 'assets/icons/',
                dest: '<%= paths.icons %>',

                mode: true
            },
            css: {
                expand: true,
                src: '**',
                cwd: 'assets/css/',
                dest: '<%= paths.css %>',

                mode: true
            },
        },
        uglify: {
            all: {
                options: {
                    banner: '<%= banner %>',
                    mangle: true,
                    compress: true,
                    beautify: false
                },
                files: [{
                    // "<%= paths.js %>/scripts.js": [
                    //     "assets/js/scripts.js"
                    // ],
                    expand: true,
                    cwd: 'assets/js/',
                    src: ['**/*.js'],
                    dest: '<%= paths.js %>'
                    // "<%= paths.js %>/project.js": [
                    //     "public/typo3conf/ext/base_project/Resources/Public/JavaScript/project.js"
                    // ]
                }]
            },
            lazysizes: { 
                src: [
                    'node_modules/lazysizes/lazysizes.js',
                ],
                dest: '<%= paths.js %>/lazysizes.js'
            },
            bootstrap: { 
                src: [
                    'node_modules/@popperjs/core/dist/umd/popper.js',
                    'node_modules/bootstrap/dist/js/bootstrap.js',
                ],
                dest: '<%= paths.js %>/bootstrap.js'
            },
            fslightbox: { 
                src: [
                    'node_modules/fslightbox/index.js'
                ],
                dest: '<%= paths.js %>/fslightbox.js'
            },
            swiper: { 
                src: [
                    'node_modules/swiper/swiper-bundle.min.js'
                ],
                dest: '<%= paths.js %>/swiper.js'
            },
            imagesloaded: { 
                src: [
                    'node_modules/imagesloaded/imagesloaded.pkgd.min.js'
                ],
                dest: '<%= paths.js %>/imagesloaded.js'
            },
            masonry: { 
                src: [
                    'node_modules/masonry-layout/dist/masonry.pkgd.min.js'
                ],
                dest: '<%= paths.js %>/masonry.js'
            },
            gsap: { 
                src: [
                    'node_modules/gsap/dist/gsap.js',
                    // 'node_modules/gsap/dist/Flip.js',
                    'node_modules/gsap/dist/ScrollTrigger.js',
                    // 'node_modules/gsap/dist/Observer.js',
                    // 'node_modules/gsap/dist/ScrollToPlugin.js',
                    // 'node_modules/gsap/dist/Draggable.js',
                    // 'node_modules/gsap/dist/EaselPlugin.js',
                    // 'node_modules/gsap/dist/MotionPathPlugin.js',
                    // 'node_modules/gsap/dist/PixiPlugin.js',
                    // 'node_modules/gsap/dist/TextPlugin.js',
                    // 'node_modules/gsap/dist/ScrollSmoother.js',
                ],
                dest: '<%= paths.js %>/gsap.js'
            }
        },
        sass: {
            options: {
                implementation: sass,
                outputStyle: 'expanded',
                precision: 8,
                // sourceComments: true,
                sourceMap: true
            },
            layout: {
                files: {
                    '<%= paths.css %>style.css': '<%= paths.sass %>style.scss'
                }
            },
            swiper: {
                files: {
                    '<%= paths.css %>swiper.css': '<%= paths.sass %>swiper.scss'
                }
            }
        },
        cssmin: {
            options: {
                keepSpecialComments: '*',
                advanced: false
            },
            layout: {
                src: '<%= paths.css %>style.css',
                dest: '<%= paths.css %>style.min.css'
            },
            swiper: {
                src: '<%= paths.css %>swiper.css',
                dest: '<%= paths.css %>swiper.min.css'
            }
        },
        imagemin: {
            extension: {
                options: {
                    // optimizationLevel: 3,
                    svgoPlugins: [{removeViewBox: false}],
                    // use: [mozjpeg()] // Example plugin usage
                },
                files: [{
                    expand: true,
                    cwd: 'assets/images/',
                    src: [
                        '**/*.{png,jpg,gif}','assets/images/**/*.{png,jpg,gif}'
                    ],
                    dest: '<%= paths.img %>'
                }]
            }
        },
        svgmin: {
            options: {
                plugins: [
                    {
                        name: 'preset-default',
                        params: {
                            overrides: {
                                sortAttrs: false,
                                removeViewBox: false,
                                removeUselessStrokeAndFill: false
                            }
                        }
                    }
                ]
            },
            dist: {
                files: [
                    {
                        expand: true,
                        cwd: 'assets/images/',
                        src: ['**/*.svg'],
                        dest: '<%= paths.img %>',
                        ext: '.svg'
                        // ie:
                    }
                ]
            }
        },
        watch: {
            options: {
                livereload: true
            },
            sass: {
                files: ['<%= paths.sass %>**/*.scss', '**/*.scss'],
                tasks: ['css']
            },
            javascript: {
                files: 'assets/**/*.js',
                tasks: ['js']
            },
            images: {
                files: 'assets/**/*.{png,jpg,gif,svg}',
                tasks: ['images']
            }
        }
    });

    /**
     * Register tasks
    //  */
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-svgmin');
    grunt.loadNpmTasks('grunt-contrib-copy');

    /**
     * Grunt update task
     */
    grunt.registerTask('css', ['sass', 'cssmin']);
    grunt.registerTask('images', ['imagemin', 'svgmin']);
    grunt.registerTask('js', ['uglify']);
    grunt.registerTask('build', ['js', 'css', 'imagemin', 'svgmin', 'copy']);
    grunt.registerTask('default', ['build']);

};
