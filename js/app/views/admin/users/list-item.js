define(['marionette', 'text!templates/admin/users/list-item.html'], function(Marionette, Tmpl){
    return Marionette.ItemView.extend({
        template: _.template(Tmpl),
        tagName: "tr",
        events: {
            'click #revoke-access': 'revoke',
            'click #reinstate-access': 'reinstate'
        },
        revoke: function(){
            this.model.lock();
            this.render();
        },
        reinstate: function(){
            this.model.unlock();
            this.render();
        }
    });
});