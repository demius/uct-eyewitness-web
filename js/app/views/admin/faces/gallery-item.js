define(['marionette', 'text!templates/admin/faces/gallery-item.html'], function(Marionette, Tmpl){
    return Marionette.ItemView.extend({
        template: _.template(Tmpl),
        tagName: 'div',
        className: 'col-sm-4 col-md-2'
    });
});