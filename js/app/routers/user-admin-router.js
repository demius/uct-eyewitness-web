define(['marionette', 'app/controllers/user-admin-controller'], function(Marionette, UserAdminController){
    return Marionette.AppRouter.extend({
        controller: new UserAdminController(),
        appRoutes: {
            "admin/users": "list",
            "admin/users/register": "register"
        }
    });
});