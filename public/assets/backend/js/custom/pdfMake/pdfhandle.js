function toDataURL(src, callback){
    var image = new Image();
    image.crossOrigin = 'Anonymous';
    image.onload = function(){
       var canvas = document.createElement('canvas');
       var context = canvas.getContext('2d');
       canvas.height = this.naturalHeight;
       canvas.width = this.naturalWidth;
       context.drawImage(this, 0, 0);
       var dataURL = canvas.toDataURL('image/jpeg');
       callback(dataURL);
    };
    image.src = src;
 }





function proccessdoc(doc) {
    var arr2 = $('.img-fluid').map(function(){
        return this.src;
   }).get();

for (var i = 0, c = 1; i < arr2.length; i++, c++) {
         doc.content[1].table.body[c][0] = {
           image: arr2[i],
           width: 80,
           class:'img-fluid',
         }
}
    var dir = document.dir == 'rtl' ? 'right' : 'left';
    var lang = document.dir == 'rtl' ? 'ar' : 'left';
    dir = 'center'; // look better in view
    
        loadFont();
        pdfMake.fonts = {
            Cairo: {
                normal: 'Cairo-Regular-400.ttf',
                bold: 'Cairo-Regular-400.ttf',
                italics: 'Cairo-Regular-400.ttf',
                bolditalics: 'Cairo-Regular-400.ttf'
            }
        };
     
    var font = 'Cairo';
    doc.defaultStyle.font = font;
    doc.content[0]['text'] = doc.content[0]['text'].split(' ').reverse().join(' '); // Header Label
    if (lang == 'ar') {
        for (var i = 0; i < doc.content[1].table.body.length; i++) {
            doc.content[1].table.body[i] = doc.content[1].table.body[i].reverse();
            for (var j = 0; j < doc.content[1].table.body[i].length; j++) {
                doc.content[1].table.body[i][j]['text'] = doc.content[1].table.body[i][j]['text'].split(' ').reverse().join(' ');
            }
        }
    }
    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
    var now = new Date();
    var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();




    doc.header = (function() {
        // Done on http://codebeautify.org/image-to-base64-converter
        
        return {
            columns: [{
                image: toDataURL('https://images.unsplash.com/photo-1606115915090-be18fea23ec7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=465&q=80', function(dataURL){
                    (dataURL)
                 }),                   
                width: 50
            }],
            margin: 20
        };
    });
    doc.footer = function(page, pages) {
        return {
            columns: [{
                    alignment: dir,
                    text: ['All rights reserved : ', {
                        text: jsDate.toString()
                    }]
                },
                {
                    alignment: dir,
                    text: ['Page ', {
                        text: page.toString()
                    }, ' of ', {
                        text: pages.toString()
                    }]
                }
            ],
            margin: 20
        }
    };
    var objLayout = {};
    objLayout['hLineWidth'] = function(i) {
        return .5;
    };
    objLayout['vLineWidth'] = function(i) {
        return .5;
    };
    objLayout['hLineColor'] = function(i) {
        return '#aaa';
    };
    objLayout['vLineColor'] = function(i) {
        return '#aaa';
    };
    objLayout['paddingLeft'] = function(i) {
        return 4;
    };
    objLayout['paddingRight'] = function(i) {
        return 4;
    };
    doc.content[0].layout = objLayout;
} 
