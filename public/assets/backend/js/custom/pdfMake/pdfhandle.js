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
     
 

    // https://stackoverflow.com/questions/72356985/how-to-export-data-table-with-images-as-pdf
//https://javascript.plainenglish.io/how-to-get-image-data-as-a-base64-url-in-javascript-223a0f2dc514
         
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

            
          const img = new Image();
          img.crossOrigin = 'anonymous';

  var imgToExport = document.getElementById(arr2[i]);
  var canvas = document.createElement('canvas');
  canvas.width = imgToExport.width; 
  canvas.height = imgToExport.height; 
  const ctx = canvas.getContext('2d');

  ctx.drawImage(imgToExport, 0, 0);
  base64data = canvas.toDataURL('image/jpeg');   



doc.content[1].table.body[c][0] = {
    image:    base64data
}    
 
            


        }
 
    
 


 
   

 
} 
