define(['marionette', 'app/views/admin/faces/gallery-item', 'text!templates/admin/faces/gallery.html'], function(Marionette, ChildView, Tmpl){
    return Marionette.CompositeView.extend({
        template: _.template(Tmpl),
        childView: ChildView
    });
});