define(['backbone'], function(Backbone){
    return Backbone.Model.extend({
        lock: function(){
            if(!this.get('locked')){
                this.set('locked', true);
                this.save({
                    contentType: 'application/x-www-form-urlencoded'
                });
            }
        },
        unlock: function(){
            if(this.get('locked')){
                this.set('locked', false);
                this.save({
                    contentType: 'application/x-www-form-urlencoded'
                });
            }
        }
    });
});