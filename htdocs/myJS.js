var	FNF=LNF=TNF=DOBF=UNF=EMF=PWF=CPF=false;
var xmlHttp;
var seatCount=0;
function correctTime(num)
{
	for(var i=0; i<num; i++)
	{
		var starttime=document.getElementById('starting'+i).innerHTML;
		var endtime=document.getElementById('ending'+i).innerHTML;
		document.getElementById('starting'+i).innerHTML=starttime.substring(0, 8);
		document.getElementById('ending'+i).innerHTML=endtime.substring(0, 8);
	}
}

//---------------------------------------------------------------

function reserveSeats() {
			
	var selectedList = getSelectedList('Reserve Seats');
			
		if (selectedList) {
			if (confirm('Do you want to reserve selected seat/s ' + selectedList + '?')) {
				document.forms[0].oldStatusCode.value=0;
				document.forms[0].newStatusCode.value=1;
				isSelected();
				//document.forms[0].action='bookseats.php';
				//document.forms[0].submit();
			 } //else {
				// clearSelection();
				// }
			}
		}
//--------------------------------------------------------------------------------

//---------------------------------------------------------------

function allowSubmission() {
			
	if (FNF && LNF && TNF && DOBF && UNF && EMF && PWF && CPF) {

				document.forms[0].submit();
			 } //else {
				// clearSelection();
				// }
			}
//--------------------------------------------------------------------------------
function checkSeat(num){
	
$('#Seat'+num).on('input', function () {

    if ($('#Seat'+num).is(':checked')) {
        
		//document.getElementById("Seat"+num).checked = false;
		//$("#Seat"+num).click();
		if(seatCount<5){
		seatCount++;
		document.getElementById('SeatDiv'+num).className='seatSelected';}
		
    } else {

		//document.getElementById("Seat"+num).checked = true;
		//$("#Seat"+num).click();
		//document.getElementById("SeatDiv"+num).style = "background-color: lightgreen;";
		seatCount--;
		document.getElementById('SeatDiv'+num).className='seat';
    }
});}

//-------------------------------------------------------------------------------------------
var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : 'your_site_key'
        });
      };
//-------------------------------------------------------------------------------------------
function capt() {
	if (grecaptcha.getResponse() == ""){
    alert("You must complete ReCaptcha first!");
} }
//-------------------------------------------------------------------------------------------
function validateFN(a)
{
	var unRegEx= /^[a-zA-Z\s]{3,30}$/;
	if(unRegEx.test(a))
	{
		document.getElementById('validinput1').className='correct';
		document.getElementById('validinput1').innerHTML="Valid Name.";
		FNF=true;
	}
	else{
		document.getElementById('validinput1').className='errormsg';
		document.getElementById('validinput1').innerHTML="Invalid Name.";
		FNF=false;
		}
}
//-------------------------------------------------------------------------------------------
function validateLN(a)
{
	var unRegEx= /^[a-zA-Z\s]{3,30}$/;
	if(unRegEx.test(a))
	{
		document.getElementById('validinput2').className='correct';
		document.getElementById('validinput2').innerHTML="Valid Name.";
		LNF=true;
	}
	else{
		document.getElementById('validinput2').className='errormsg';
		document.getElementById('validinput2').innerHTML="Invalid Name.";
		LNF=false;
		}
}
//-------------------------------------------------------------------------------------------
function validateTN(a)
{
	var unRegEx= /^[3-9]{1}[0-9]{7}$/;
	if(unRegEx.test(a))
	{
		document.getElementById('validinput3').className='correct';
		document.getElementById('validinput3').innerHTML="Valid Mobile.";
		TNF=true;
	}
	else{
		document.getElementById('validinput3').className='errormsg';
		document.getElementById('validinput3').innerHTML="Invalid Mobile.";
		TNF=false;
		}
}
//-------------------------------------------------------------------------------------------
function validateUN(a)
{
	var unRegEx= /^[a-zA-Z_0-9]{3,30}$/;
	if(unRegEx.test(a))
	{
		document.getElementById('validinput4').className='correct';
		document.getElementById('validinput4').innerHTML="Valid Username.";
		UNF=true;
	}
	else{
		document.getElementById('validinput4').className='errormsg';
		document.getElementById('validinput4').innerHTML="Invalid Username.";
		UNF=false;
		}
}
//-------------------------------------------------------------------------------------------
function validateEM(a)
{
	var unRegEx= /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/;
	if(unRegEx.test(a))
	{
		document.getElementById('validinput5').className='correct';
		document.getElementById('validinput5').innerHTML="Valid Email.";
		EMF=true;
	}
	else{
		document.getElementById('validinput5').className='errormsg';
		document.getElementById('validinput5').innerHTML="Invalid Email.";
		EMF=false;
		}
}
//-------------------------------------------------------------------------------------------
function validatePW(a)
{
	var unRegEx= /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,25}/;
	if(unRegEx.test(a))
	{
		document.getElementById('validinput6').className='correct';
		document.getElementById('validinput6').innerHTML="Valid Password.";
		PWF=true;
	}
	else{
		document.getElementById('validinput6').className='errormsg';
		document.getElementById('validinput6').innerHTML="Your password must contain at least 1 lower case letter, 1 uppercase letter and 1 digit.";
		PWF=false;
		}
}
//-------------------------------------------------------------------------------------------
function confirmPW(a)
{
	var pass= document.getElementById('PW').innerHTML;
	if(a == pass)
	{
		document.getElementById('validinput7').className='correct';
		document.getElementById('validinput7').innerHTML="Password Confirmed.";
		CPF=true;
	}
	else{
		document.getElementById('validinput7').className='errormsg';
		document.getElementById('validinput7').innerHTML="You must match your previously entered password.";
		CPF=false;}
}

//-----------------------------------------------Ajax------------------------------------------


function GetXmlHttpObject()
{ 
    var xmlHttp=null; 
    try 
        { 
        // Firefox, Opera 8.0+, Safari 
        xmlHttp=new XMLHttpRequest(); 
        }
    catch (e) 
        { 
        // Internet Explorer 
        try 
            { xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); } 
        catch (e) 
            { xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); }
        } 
    return xmlHttp; 
} 


function showPic(str)
{
    
    if (str.length==0)
    {   
        document.getElementById("pic").src="";   
        return;
    }

    xmlHttp = GetXmlHttpObject();

    if (xmlHttp==null)
    {   
        alert ("Your browser does not support AJAX!");   
        return;
    } 

    var url="getpics.php";
    url = url + "?choosePic=" + str;
    url = url + "&sid=" + Math.random(); //another way to prevent caching

    xmlHttp.onreadystatechange = stateChanged; //Not a function call
    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);
    
} 
function stateChanged()
{ 
    if (xmlHttp.readyState==4)
    { 
	   document.getElementById("pic").src=xmlHttp.responseText;
	   // the old way: list.innerHTML=xmlHttp.responseText;
    }
    
}

//----------------------------------------------------------------------------------------
function reFrame(a)
{
	var link= document.getElementById('link');
	if(link.innerHTML!="")
	{
		document.getElementById("iframediv").className='shown largecardcolumn';
		var iframe = document.getElementById("trailer");
		iframe.src = link.innerHTML;
		//iframe.reload();
		
	}
	else{
		document.getElementById("iframediv").className="hidden largecardcolumn";
		var iframe = document.getElementById("trailer");
		iframe.src = link.innerHTML;
	}
}