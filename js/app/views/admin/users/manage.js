define(['marionette', 'app/collections/users', 'app/views/admin/users/list', 'text!templates/admin/users/manage.html'], function(Marionette, UserCollection, ListView, Tmpl){
    return Marionette.LayoutView.extend({
        template: _.template(Tmpl),
        regions: {
            list: '#user-list',
            create: '#create-form-wrapper'
        },
        onBeforeShow: function(){
            var self = this;
            var collection = new UserCollection();
            $.when(collection.fetch()).done(function(){
                self.getRegion('list').show(new ListView({
                    collection: collection
                }));
            });
        }
    });
});