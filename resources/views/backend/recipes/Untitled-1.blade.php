normal: 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/fonts/roboto/Roboto-Regular.ttf',



normal: 'https://cdn.cpcc.edu/latest/fonts/roboto/Roboto-Regular.ttf',
bold: 'https://cdn.cpcc.edu/latest/fonts/roboto/Roboto-Medium.ttf',
italics: 'https://cdn.cpcc.edu/latest/fonts/roboto/Roboto-Italic.ttf',
bolditalics: 'https://cdn.cpcc.edu/latest/fonts/roboto/Roboto-MediumItalic.ttf',


var docDefinition = {
    pageOrientation: 'landscape',
    pageSize: 'A4',
    content: [
     //Content from htmlpdfmake by HTML template
    ],
    styles:{
      greenFont:{ 
        color:'#005745'
      },
      arabicFont: {
        font: 'Roboto'
      },
      rowcolor :{
        background: 'red'
      }
    }
 }








doc.defaultStyle.font = "Roboto";
doc.styles.message.alignment = "right";
doc.styles.tableBodyEven.alignment = "center";
doc.styles.tableBodyOdd.alignment = "center";
doc.styles.tableFooter.alignment = "center";
doc.styles.tableHeader.alignment = "center";
var i = 1;