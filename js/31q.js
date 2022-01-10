function daily(){
mydate=new Date();
num=mydate.getDate()%31;
document.write('<img src="http://ichoose.pe.hu/31q/'+num+'.jpg">');
}