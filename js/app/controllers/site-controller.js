define(['marionette', 'app/app', 'app/views/home'], function(Marionette, App, HomepageView){
    return Marionette.Controller.extend({
        home: function(){
            App.getRegion('page').show(new HomepageView());
        },
        contact: function(){
            alert('nothing here yet');
        }
    });
});