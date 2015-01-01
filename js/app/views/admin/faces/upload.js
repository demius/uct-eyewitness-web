define(['marionette', 'text!templates/admin/faces/upload.html', 'util/file-uploader'], function(Marionette, Tmpl){
    return Marionette.ItemView.extend({
        template: _.template(Tmpl),
        onShow: function(){
            new qq.FileUploaderBasic({
                element: document.getElementById('upload-button'),
                button: document.getElementById('upload-button'),
                allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
                action: '/inc/forms/upload.php',
                multiple: true,
                extraDropzones: [document.getElementById('primary-dropzone')]
            });
        }
    });
});