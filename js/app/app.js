define(['marionette'], function(Marionette){
   return new Marionette.Application({
        regions: {
            nav: '#nav',
            page: '#page'
        },
        active: null,
        goto: function(view){
            if(view && this.active != view){
                this.getRegion('page').show(view);
                this.active = view;
            }
        }
   });
})