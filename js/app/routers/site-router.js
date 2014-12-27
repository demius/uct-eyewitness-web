define(['marionette', 'app/controllers/site-controller'], function(Marionette, SiteController){
    return Marionette.AppRouter.extend({
        controller: new SiteController(),
        appRoutes: {
            "": "home",
            "contact": "contact"
        }
    });
});