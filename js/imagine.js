var msg = new Array();
msg[0] = '011';
msg[1] = '001';
msg[2] = '002';
msg[3] = '003';
msg[4] = '004';
msg[5] = '005';
msg[6] = '006';
msg[7] = '007';
msg[8] = '008';
msg[9] = '009';
msg[10] = '010';

var no = Math.floor(Math.random() * msg.length);
document.write('<img src="http://ichoose.pe.hu/imagine/'+msg[no]+'.JPG">');