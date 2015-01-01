define(['marionette', 'app/app', 'app/views/admin/faces/manage'], function(Marionette, App, FaceManagementView){
    return Marionette.AppRouter.extend({
        routes: {
            'admin/faces': 'list'
        },
        list: function(){
            App.goto(new FaceManagementView());
        }
    });
});