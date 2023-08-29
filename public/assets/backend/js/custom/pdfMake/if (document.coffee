    if (document.dir = 'rtl') {
        
        alert('dasd');
        doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
    

    }else{




 
        doc.content[0]['text'] = doc.content[0]['text'].split(' ').reverse().join(' '); // Header Label
        for (var i = 0; i < doc.content[1].table.body.length; i++) {
            doc.content[1].table.body[i] = doc.content[1].table.body[i].reverse();
            for (var j = 0; j < doc.content[1].table.body[i].length; j++) {
                doc.content[1].table.body[i][j]['text'] = doc.content[1].table.body[i][j]['text'].split(' ').reverse().join(' ');
            }
        }    
        doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');





 

    }
