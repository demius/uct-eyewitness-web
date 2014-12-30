define(['marionette', 'app/app', 'app/views/home'], function(Marionette, App, HomepageView){
    return Marionette.AppRouter.extend({
        routes: {
            '': 'home'
        },
        home: function(){
            App.goto(new HomepageView());
        }
    });
});