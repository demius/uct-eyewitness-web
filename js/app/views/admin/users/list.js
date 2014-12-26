define(['marionette', 'app/views/admin/users/list-item', 'text!templates/admin/users/list.html'], function(Marionette, ChildView, Tmpl){
    return Marionette.CollectionView.extend({
        template: _.template(Tmpl),
        tagName: 'tbody',
        childView: ChildView
    });
});