https://stackoverflow.com/questions/72356985/how-to-export-data-table-with-images-as-pdf


function proccessdoc(doc,imageToBase64) {


    var arr2 = $('.img-fluid').map(function(){
        return this.src;
   }).get();

   var ch = 0; 
   for (var i = 0, c = 1; i < arr2.length; i++, c++) {
        ch+= c;
    }

 



 
    
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


    

    if (document.dir = 'rtl') {
        

  
            
        doc.content[0]['text'] = doc.content[0]['text'].split(' ').reverse().join(' '); // Header Label
        for (var i = 0; i < doc.content[1].table.body.length; i++) {
            doc.content[1].table.body[i] = doc.content[1].table.body[i].reverse();               
                  
        }                
            
        for (var i = 0, c = 1; i < arr2.length; i++, c++) {
            doc.content[1].table.body[c][0] = {
              image: arr2[i],
              width: 80,
              class:'img-fluid',
            }
         }
         
        doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');

       
            

    

    }else if (document.dir = 'ltr') {

        doc.content[0]['text'] = doc.content[0]['text'].split(' ').reverse().join(' '); // Header Label
        for (var i = 0; i < doc.content[1].table.body.length; i++) {
            doc.content[1].table.body[i] = doc.content[1].table.body[i].reverse();               
            for (var j = 0; j < doc.content[1].table.body[i].length; j++) {
                doc.content[1].table.body[i][j]['text'] = doc.content[1].table.body[i][j]['text'].split(' ').reverse().join(' ');
            }            
        }







 

    }

    var now = new Date();
    var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();


 



    doc.header = (function() {
        // Done on http://codebeautify.org/image-to-base64-converter
        
        return {
            columns: [{
                image: imageToBase64 ,               
                width: 50
            }],
            margin: 20
        };
    });
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
} 
