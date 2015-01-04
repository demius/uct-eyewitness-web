define([], function(){
    return function(options){
        var _defaults = {
            dropZone: '#dropzone',
            onSuccess: function(filename){
                console.log(filename + ' uploaded successfully.');
            },
            onError: function(error){
                console.log(error);
            }
        };
    };
});