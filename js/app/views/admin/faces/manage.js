define(['marionette', 'app/collections/materials', 'app/views/admin/faces/gallery', 'app/views/admin/faces/upload', 'text!templates/admin/faces/manage.html'], function(Marionette, MaterialCollection, GalleryView, UploadView, Tmpl){
    return Marionette.LayoutView.extend({
        template: _.template(Tmpl),
        regions: {
            gallery: '#gallery',
            upload: '#upload'
        },
        onBeforeShow: function(){
            var self = this;
            var collection = new MaterialCollection();
            $.when(collection.fetch()).done(function(){
                self.getRegion('gallery').show(new GalleryView());
                self.getRegion('upload').show(new UploadView());
            });
        }
    });
});