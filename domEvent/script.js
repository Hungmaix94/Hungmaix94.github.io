 var display=document.getElementById('out');
 var keys = document.querySelectorAll('#keys input');
 
 function btnplus(){
	display.value+="+";
	
}
function btnsub(){
	display.value+="-";
	
}
function btnsin(){
	x= display.value;
	x=Math.sin(x*Math.PI/180);
	display.value=x;
}
function btncos(){
	x= display.value;
	x=Math.cos(x*Math.PI/180);
	display.value=x;
}
function btntan(){
	x= display.value;
	x=Math.tan(x*Math.PI/180);
	display.value=x;
}
function btnexp(){
	x= display.value;
	x=Math.exp(x);
	display.value=x;
}
function btnfac(){
	x= display.value;
	var kq=1;
	for(var i=1; i<=x;i++){
		kq=kq*i;
	};
	display.value=kq;
}
function btnpercent(){
	x= display.value;
	x= x/100;
	display.value=x;
}
function btndot(){
	display.value+=".";
}
function btnmulti(){
	display.value+="*";
}
function btndiv(){
	display.value+="/";
}
function btnsqrt(){
	x=display.value;
	x=Math.sqrt(x);
	display.value=x;
}
function btnsqr(){
	x=display.value;
	x=Math.pow(x,2);
	display.value=x;


}
function btnclear(){
	var number=display.value;
	var leng =number.length-1;
	var newnumber=number.substring(0,leng);
	display.value=newnumber;

}
function btnoff(){

	display.style.backgroundColor = "#003333";
	display.placeholder="";
	display.value="";
	display.disable=true;
}
function btnon(){
	display.value="";
	display.style.backgroundColor = "#CECE45";
	display.placeholder="0";
}
function btne(){
	x=display.value;
	x=Math.E;
	display.value=x;
}
function btneval(){
	document.Calculator.display.value= eval(document.Calculator.display.value);

}
