require.config({
    baseUrl: '/js/vendor',
    paths: {
        'app': '/js/app',
        'templates': '/templates',
        'text': 'text',
        'jquery': 'jquery-1.11.2.min',
        'bootstrap': 'bootstrap.min',
        'underscore': 'underscore-min',
        'backbone': 'backbone-min',
        'marionette': 'backbone.marionette.min'
    },
    shim: {
        'underscore': {
            exports: '_'
        },
        'backbone': {
            deps: ['jquery', 'underscore'],
            exports: 'Backbone'
        },
        'marionette': {
            deps: ['backbone'],
            exports: 'Marionette'
        },
        'bootstrap': {
            deps: ['jquery']
        }
    }
    //urlArgs: "bust=" + (new Date()).getTime()
});