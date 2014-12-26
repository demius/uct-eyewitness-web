define(['backbone', 'app/models/user'], function(Backbone, User){
    return Backbone.Collection.extend({
        model: User,
        url: '/api/users'
    });
});