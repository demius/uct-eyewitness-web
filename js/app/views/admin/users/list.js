define(['marionette', 'app/views/admin/users/list-item', 'text!templates/admin/users/list.html'], function(Marionette, ChildView, Tmpl){
    return Marionette.CompositeView.extend({
        template: _.template(Tmpl),
        childViewContainer: 'tbody',
        childView: ChildView
    });
});