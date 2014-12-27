define(['marionette', 'app/app', 'app/views/admin/users/manage'], function(Marionette, App, ManagementView){
    return Marionette.Controller.extend({
        list: function() {
            App.getRegion('page').show(new ManagementView());
        },
        register: function(){
            //
        }
    });
});