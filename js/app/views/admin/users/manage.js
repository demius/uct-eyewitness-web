define(['marionette', 'app/collections/users', 'app/views/admin/users/list', 'app/views/admin/users/add', 'text!templates/admin/users/manage.html'], function(Marionette, UserCollection, ListView, GrantAccessView, Tmpl){
    return Marionette.LayoutView.extend({
        template: _.template(Tmpl),
        regions: {
            list: '#user-list',
            grant: '#grant-access-form-wrapper'
        },
        onBeforeShow: function(){
            var self = this;
            var collection = new UserCollection();
            $.when(collection.fetch()).done(function(){
                self.getRegion('list').show(new ListView({
                    collection: collection
                }));

                self.getRegion('grant').show(new GrantAccessView());
            });
        }
    });
});