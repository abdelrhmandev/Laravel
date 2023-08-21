function proccessdoc(doc) {
    var arr2 = $('.img-fluid').map(function(){
        return this.src;
   }).get();

    for (var i = 0, c = 1; i < arr2.length; i++, c++) {
            doc.content[1].table.body[c][0] = {
                image: arr2[i],
                width: 50,
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
     
      
   
   
 } 
