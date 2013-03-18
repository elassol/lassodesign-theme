(function() {  
    tinymce.create('tinymce.plugins.quote', {  
        init : function(ed, url) {  
            ed.addButton('quote', {  
                title : 'Add a slideshow',  
                image : url+'/../images/slideshow.png',  
                onclick : function() {  
                     ed.selection.setContent('[slideshow]' + ed.selection.getContent() + '[/slideshow]');  
  
                }  
            });  
        },  
        createControl : function(n, cm) {  
            return null;  
        },  
    });  
    tinymce.PluginManager.add('quote', tinymce.plugins.quote);  
})();  