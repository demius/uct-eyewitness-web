define(['marionette', 'text!templates/admin/users/list-item.html'], function(Marionette, Tmpl){
    return Marionette.ItemView.extend({
        template: _.template(Tmpl)
    });
});