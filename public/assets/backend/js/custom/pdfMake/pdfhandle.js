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


    doc.content[0]['text'].split(' ').reverse().join(' ');

        for (var i = 0; i < doc.content[1].table.body.length; i++) {
            doc.content[1].table.body[i] = doc.content[1].table.body[i].reverse();

            
             

        }
    
        doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
 
  
} 
