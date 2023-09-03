function  getBase64ImageFromURL(url) {
    return new Promise((resolve, reject) => {
      var img = new Image();
      img.setAttribute("crossOrigin", "anonymous");
      img.onload = () => {
        var canvas = document.createElement("canvas");
        canvas.width = img.width;
        canvas.height = img.height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);
        var dataURL = canvas.toDataURL("image/png");
        resolve(dataURL);
      };
      img.onerror = error => {
        reject(error);
      };
      img.src = url;
    });
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


    //     var arr2 = $('.img-fluid').map(function(){
    //         return this.src;
    //    }).get();
     

 /////////

 
var arr2 = $('.img-fluid').map(function(){
    return this.id;
}).get();


        // var base64 = getBase64Image(document.getElementById(arr2[i]));
        for (var i = 0, c = 1; i < arr2.length; i++, c++) {

            
            doc.content[1].table.body[c][0]  = {
                image: getBase64ImageFromURL('https://www.ngdevelop.tech/wp-content/uploads/2017/12/cropped-NgDevelopLogo_400X100.png'),
                width: 100,
                height: 100,
                alignment: 'left'
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
