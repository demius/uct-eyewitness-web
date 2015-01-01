define(['backbone', 'app/models/material'], function(Backbone, Material){
    return Backbone.Collection.extend({
        model: Material,
        url: '/api/materials'
    });
});