define(['marionette', 'text!templates/home.html'], function(Marionette, Tmpl){
    return Marionette.ItemView.extend({
        template: _.template(Tmpl)
    });
});