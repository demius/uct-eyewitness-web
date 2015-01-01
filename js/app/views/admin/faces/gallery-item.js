define(['marionette', 'text!templates/admin/faces/gallery-item.html'], function(Marionette, Tmpl){
    return Marionette.ItemView.extend({
        template: _.template(Tmpl)
    });
});