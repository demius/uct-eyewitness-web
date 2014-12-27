define(['marionette', 'text!templates/site-nav.html'], function(Marionette, Tmpl){
    return Marionette.ItemView.extend({
        template: _.template(Tmpl)
    })
});