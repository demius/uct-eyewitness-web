define(['marionette', 'text!templates/admin/users/add.html'], function(Marionette, Tmpl){
    return Marionette.ItemView.extend({
        template: _.template(Tmpl)
    });
});