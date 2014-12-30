define(['marionette', 'app/app', 'app/views/admin/users/manage'], function(Marionette, App, UserManagementView){
    return Marionette.AppRouter.extend({
        routes: {
            'admin/users': 'list',
            'admin/users/register': 'register'
        },
        list: function(){
            App.goto(new UserManagementView());
        },
        register: function(){

        }
    });
});