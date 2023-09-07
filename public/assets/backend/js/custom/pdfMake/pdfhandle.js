function getBase64Image(img) {
  var canvas = document.createElement("canvas");
  canvas.width = img.width;
  canvas.height = img.height;
  var ctx = canvas.getContext("2d");
  ctx.drawImage(img, 0, 0);
  return canvas.toDataURL("image/png");
}




function proccessdoc(doc) { 
  
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
 
  var arr2 = $('.img-fluid').map(function(){
    return this.src;
    }).get();
    doc.images = doc.images || {};
    var myGlyph = new Image();
    
 
   if(document.dir == 'ltr' ){        
      doc.content[0]['text'] = doc.content[0]['text'].split(' ').reverse().join(' '); // Header Label
      doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');       
      for (var i = 0, c = 1; i < arr2.length; i++, c++) {        
              myGlyph.src = arr2[i];
              doc.images['myGlyph'+i] = getBase64Image(myGlyph);            
                doc.content[1].table.body[c][0]  = {   
                  image: 'myGlyph'+i,
                  fit:[80,80]
                }             
        }
       
    }
    else if (document.dir == 'rtl') {
    
        for (var i = 0; i < doc.content[1].table.body.length; i++) {
            doc.content[1].table.body[i] = doc.content[1].table.body[i].reverse();
            for (var j = 0; j < doc.content[1].table.body[i].length; j++) {
                doc.content[1].table.body[i][j]['text'] = doc.content[1].table.body[i][j]['text'].split(' ').reverse().join(' ');
            }           
        }    
        doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split(''); 

        for (var i = 0, c = 1; i < arr2.length; i++, c++) {        
            myGlyph.src = arr2[i];
            doc.images['myGlyph'+i] = getBase64Image(myGlyph);            
            doc.content[1].table.body[c][doc.content[1].table.body[0].length-1] = {
                image: 'myGlyph'+i,
                fit  :[80,80]
              }
        }
  
    
    }

    // Header Handle 
    /*
    var myGlyphlogo = new Image();
    myGlyphlogo.src = '../../assets/frontend/logo.jpg';
    doc.images['myGlyphlogo'] = getBase64Image(myGlyphlogo);     
    doc.header = (function() {
        return {
            columns: [{
                image: 'myGlyphlogo',
                width: 50
            }],
            margin: 20
        };
    });
    */

    // Footer Handle
  var now = new Date();
  var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
  doc.footer = function(page, pages) {
      return {
          columns: [{
                  alignment: document.dir,
                  text: ['All rights reserved : ', {
                      text: jsDate.toString()
                  }]
              },
              {
                  alignment: document.dir,
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


//   doc.content.splice(0, 0, {
//     text: [
//         {text: 'Texto 0', italics: true, fontSize: 12}
//     ],
//     margin: [0, 0, 0, 12],
//     alignment: 'center'
// });


/////////////////
 
 
////////////////////


  // LayOut Handle

  var objLayout = {};
  objLayout['hLineWidth'] = function(i) { return .5; };
  objLayout['vLineWidth'] = function(i) { return .5; };
  objLayout['hLineColor'] = function(i) { return '#aaa'; };
  objLayout['vLineColor'] = function(i) { return '#aaa'; };
  objLayout['paddingLeft'] = function(i) { return 4; };
  objLayout['paddingRight'] = function(i) { return 4; };
  doc.content[0].layout = objLayout;
 
 


 


} 
