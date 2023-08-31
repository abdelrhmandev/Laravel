//convert img to base64
function getBase64Image(url, callback) {
    var img = new Image();
    img.crossOrigin = "anonymous";
    var x = img.onload = function () {
        var canvas = document.createElement("canvas");
        canvas.width =this.width;
        canvas.height =this.height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(this, 0, 0);
        var dataURL = canvas.toDataURL("image/png");
        callback(dataURL);
        
    };
    img.src = url;
  }
  function getBase64Image2(img) {  
    // Create an empty canvas element  
    var canvas = document.createElement("canvas");  
    canvas.width = img.width;  
    canvas.height = img.height;  

    // Copy the image contents to the canvas  
    var ctx = canvas.getContext("2d");  
    ctx.drawImage(img, 0, 0);  

    // Get the data-URL formatted image  
    // Firefox supports PNG and JPEG. You could check img.src to  
    // guess the original format, but be aware the using "image/jpg"  
    // will re-encode the image.  
    var dataURL = canvas.toDataURL("image/png");  

    return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");  
}  

function proccessdoc(doc,logo) { 
    var arr2 = $('.img-fluid').map(function(){
        return this.src;
   }).get();
 
    
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
         for (var i = 0; i < doc.content[1].table.body.length; i++) {
            doc.content[1].table.body[i] = doc.content[1].table.body[i].reverse();
            for (var j = 0; j < doc.content[1].table.body[i].length; j++) {
                doc.content[1].table.body[i][j]['text'] = doc.content[1].table.body[i][j]['text'].split(' ').reverse().join(' ');
            }
        }    
        doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split(''); 
        // for (var i = 0, c = 1; i < arr2.length; i++, c++) {
        //     doc.content[1].table.body[c][doc.content[1].table.body[0].length-1] = {
        //       image: arr2[i],
        //       width: 60,
        //       class:'img-fluid',
        //     }
        // }
    } 

    // https://stackoverflow.com/questions/72356985/how-to-export-data-table-with-images-as-pdf
//https://javascript.plainenglish.io/how-to-get-image-data-as-a-base64-url-in-javascript-223a0f2dc514
    else if(document.dir == 'ltr' ){        
        doc.content[0]['text'] = doc.content[0]['text'].split(' ').reverse().join(' '); // Header Label
        doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
        for (var i = 0, c = 1; i < arr2.length; i++, c++) {


            
                doc.content[1].table.body[c][0]  = {
                image: getBase64Image2(arr2[i]),
                width: 70,
                class:'img-fluid',
              }
            
          
            
          
 
   }
}
   
 

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
