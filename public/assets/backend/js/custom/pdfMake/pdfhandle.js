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
  if (document.dir == 'rtl') {

    var arr2x = $('.img-fluid').map(function(){
      return this.src;
  }).get();


       for (var i = 0; i < doc.content[1].table.body.length; i++) {
          doc.content[1].table.body[i] = doc.content[1].table.body[i].reverse();
          for (var j = 0; j < doc.content[1].table.body[i].length; j++) {
              doc.content[1].table.body[i][j]['text'] = doc.content[1].table.body[i][j]['text'].split(' ').reverse().join(' ');
          }
      }    
      doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split(''); 

 


  } 

  // https://stackoverflow.com/questions/72356985/how-to-export-data-table-with-images-as-pdf
//https://javascript.plainenglish.io/how-to-get-image-data-as-a-base64-url-in-javascript-223a0f2dc514
  else if(document.dir == 'ltr' ){        
      doc.content[0]['text'] = doc.content[0]['text'].split(' ').reverse().join(' '); // Header Label
      doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');




      var arr2 = $('.img-fluid').map(function(){
          return this.src;
      }).get();
      
      
      
       
       
      for (var i = 0, c = 1; i < arr2.length; i++, c++) {        
              doc.images = doc.images || {};
              //build dictionary
              var myGlyph = new Image();
              myGlyph.src = arr2[i];
              doc.images['myGlyph'+i] = getBase64Image(myGlyph);            
                doc.content[1].table.body[c][0]  = {   
                  image: 'myGlyph'+i,
                  fit:[80,80]
                }
              }
              

  }
  
////////      

     
     

 


  /*
getBase64Image(logo, function(result){ 
  sessionStorage.setItem("Base64Image", result);
});


   var Base64Imagelogo = sessionStorage.getItem("Base64Image");
   doc.header = (function() {
      return {
          columns: [{
              image: Base64Imagelogo,
              width: 50
          }],
          margin: 20
      };
  });

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
 
  */     



 


} 
