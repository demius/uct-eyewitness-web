define(['marionette', 'text!templates/admin/faces/upload.html', 'text!templates/shared/progress-indicator.html'], function(Marionette, Tmpl){
    return Marionette.ItemView.extend({
        template: _.template(Tmpl),
        ui: {
            progress: '#upload-progress',
            progressText: '#upload-progress-text'
        },
        events: {
            "change input[type='file']": "onFilesSelected",
            "dragenter .dropzone": "toggleHighlight",
            "dragleave .dropzone": "toggleHighlight",
            "dragover .dropzone": "cancel",
            "drop .dropzone": "onFilesDropped"
        },
        cancel: function (e) {
            if (e.preventDefault) {
                e.preventDefault();
            }
            return false;
        },
        toggleHighlight: function (e) {
            $(e.currentTarget).toggleClass('dragover');
            return this.cancel(e);
        },
        onFilesSelected: function (e) {
            this.upload(e.target.files);
        },
        onFilesDropped: function (e) {
            if (e.originalEvent.dataTransfer) {
                this.upload(e.originalEvent.dataTransfer.files);
            }
            return this.toggleHighlight(e);
        },
        updateProgress: function (progress) {
            progress = Math.min(progress, 100);

            this.ui.progress
                .css({width: progress + '%'})
                .attr('aria-valuenow', progress);

            this.ui.progressText
                .text(progress + '%');
        },
        upload: function (files) {
            if (files.length > 0) {
                var totalSize = 0;
                var data = new FormData();
                for (var i = 0; i < files.length; i++) {
                    data.append(files[i].name, files[i]);
                    totalSize += files[i].size;
                }
                this.sendRequest(totalSize, data);
            }
        },
        sendRequest: function (totalSize, data) {
            var self = this;
            var xhr = new XMLHttpRequest();

            xhr.onload = function (e) {
                var uploadResults = JSON.parse(e.currentTarget.response);
                if (!uploadResults) {
                    return;
                }

                for (var i = 0; i < uploadResults.length; i++) {
                    if (uploadResults[i].succeeded) {
                        self.collection.create({
                            description: uploadResults[i].filename,
                            relative_uri: uploadResults[i].relative_uri,
                            path: uploadResults[i].path,
                            mime_type: uploadResults[i].mime_type,
                            filename: uploadResults[i].filename,
                            original_filename: uploadResults[i].original_filename
                        });
                        continue;
                    }
                }
            };

            xhr.upload.addEventListener('progress', function (e) {
                self.updateProgress(Math.ceil(e.loaded / totalSize) * 100);
            }, false);

            xhr.open('post', '/inc/forms/upload.php', true);
            xhr.send(data);
        }
    });
});