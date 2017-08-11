$(document).ready(function(){

$("input").focus( function (){
        $(this).css("border-color", "#199ad9");
        $(".erro").fadeTo("slow", 0, function(){});
        });

$("#nome").keypress(function(key) {
if((key.charCode < 97 || key.charCode > 122) && (key.charCode < 65 || key.charCode > 90) && (key.charCode != 45)) return false;
}).blur( function () {
	var input = $(this);
	var re = /^[a-zA-Z\s]*$/;
	var is_letter = re.test(input.val());

	if($(this).val().length == 0 || $(this).val() == ''){
        $(this).css("border-color", "#ff3333"); //no
        $("#err3").fadeTo("slow", 1, function(){});
        } else if(is_letter) {
		$(this).css("border-color", "#7cfc00"); //yes
	} else {
		$(this).css("border-color", "#cd2626"); //no
		$("#err4").fadeTo("slow", 1, function(){});
	}
});

$("#sobrenome").keypress(function(key) {
if((key.charCode < 97 || key.charCode > 122) && (key.charCode < 65 || key.charCode > 90) && (key.charCode != 45)) return false;
}).blur( function () {
	var input = $(this);
	var re = /^[a-zA-Z\s]*$/;
	var is_letter = re.test(input.val());

	if($(this).val().length == 0 || $(this).val() == ''){
        $(this).css("border-color", "#ff3333"); //no
        $("#err5").fadeTo("slow", 1, function(){});
        } else if(is_letter) {
		$(this).css("border-color", "#7cfc00"); //yes
	} else {
		$(this).css("border-color", "#ff3333"); //no
		$("#err6").fadeTo("slow", 1, function(){});
	}
});

$("#email").blur( function () {
	var input = $(this);
	var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
	var is_email = re.test(input.val());
	
	if($(this).val().length == 0 || $(this).val() == ''){
        $(this).css("border-color", "#ff3333"); //no
        $("#err9").fadeTo("slow", 1, function(){});
        } else if(is_email) {
		$(this).css("border-color", "#7cfc00"); //yes
	} else {
		$(this).css("border-color", "#ff3333"); //no
		$("#err10").fadeTo("slow", 1, function(){});
	}
});

$("#cpf").keypress(function(key) {
        if(key.charCode < 48 || key.charCode > 57 || $(this).val().length >= 11) return false;
    }).blur( function () {
	var input = $(this);
	var re = /^(?=.*\d)[0-9]{11}$/;
	var is_number = re.test(input.val());
	
	if($(this).val().length == 0 || $(this).val() == ''){
        $(this).css("border-color", "#ff3333"); //no
        $("#err1").fadeTo("slow", 1, function(){});
        } else if(is_number) {
		$(this).css("border-color", "#7cfc00"); //yes
	} else {
		$(this).css("border-color", "#ff3333"); //no
		$("#err2").fadeTo("slow", 1, function(){});
	}
}); 
//check
$("#senha").blur( function () {
	var input = $(this);
	
	if($(this).val().length == 0 || $(this).val() == ''){
        $(this).css("border-color", "#ff3333"); //no
        $("#err11").fadeTo("slow", 1, function(){});
        } else if(input.val().length > 7) { //falta checar pq essa porra nao funciona
		$(this).css("border-color", "#7cfc00"); //yes
	} else {
		$(this).css("border-color", "#ff3333"); //no
		$("#err12").fadeTo("slow", 1, function(){});
	}
});

$("#anonascimento").keypress(function(key) {
        if(key.charCode < 48 || key.charCode > 57) return false;
    }).blur( function () {
	var input = $(this);
	var re = /^(?=.*\d)[0-9]{4}$/;
	var is_number = re.test(input.val());
	
	if(input.val().length == 0 || input.val() == ''){
        $(this).css("border-color", "#ff3333"); //no - empty
        $("#err7").fadeTo("slow", 1, function(){});
        } 
    else if(is_number) { 
		if(1900 > input.val() || 2010 < input.val()) {
		$(this).css("border-color", "#ff3333"); //no - ano invalido
		$("#err8").fadeTo("slow", 1, function(){});
	} else {
		$(this).css("border-color", "#7cfc00"); //yes - ano valido
	}} 
	else {
		$(this).css("border-color", "#ff3333"); //idk what u typed
		$("#err8").fadeTo("slow", 1, function(){});
	}
});

});

/*
https://www.webdesignerdepot.com/2012/01/password-strength-verification-with-jquery/
https://www.webdesignerdepot.com/2013/11/easily-create-stunning-animated-charts-with-chart-js/


// Back To Top button
$('a.top').click(function(){
$(document.body).animate({scrollTop : 0},800);
return false;
});

//toggle class hover
$(‘.btn').hover(function(){
$(this).addClass(‘hover’);
}, function(){
$(this).removeClass(‘hover’);
}
);

//disable input button
$('input[type="submit"]').attr("disabled", true);
//enable
$('input[type="submit"]').removeAttr("disabled”);

//make 2 divs the same heigth
$(‘.div').css('min-height', $(‘.main-div').height());

//zebra stripe unordered list
$('li:odd').css('background', '#E8E8E8’);



<div id="pswd_info">
    <h4>Password must meet the following requirements:</h4>
    <ul>
        <li id="letter" class="invalid">At least <strong>one letter</strong></li>
        <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
        <li id="number" class="invalid">At least <strong>one number</strong></li>
        <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
    </ul>
</div>

CSS
#pswd_info {
    display:none;
}

#pswd_info {
    position:absolute;
    bottom:-75px;
    bottom: -115px\9;
    right:55px;
    width:250px;
    padding:15px;
    background:#fefefe;
    font-size:.875em;
    border-radius:5px;
    box-shadow:0 1px 3px #ccc;
    border:1px solid #ddd;
}

.invalid {
    background:url(../images/invalid.png) no-repeat 0 50%;
    padding-left:22px;
    line-height:24px;
    color:#ec3f41;
}
.valid {
    background:url(../images/valid.png) no-repeat 0 50%;
    padding-left:22px;
    line-height:24px;
    color:#3a7d34;
}

JQUERY
$('input[type=password]').keyup(function() {
    // keyup code here
}).focus(function() {
    $('#pswd_info').show();
}).blur(function() {
    $('#pswd_info').hide();
});


//validate the length
if ( pswd.length < 8 ) {
    $('#length').removeClass('valid').addClass('invalid');
} else {
    $('#length').removeClass('invalid').addClass('valid');
}
//validate letter
if ( pswd.match(/[A-z]/) ) {
    $('#letter').removeClass('invalid').addClass('valid');
} else {
    $('#letter').removeClass('valid').addClass('invalid');
}

//validate capital letter
if ( pswd.match(/[A-Z]/) ) {
    $('#capital').removeClass('invalid').addClass('valid');
} else {
    $('#capital').removeClass('valid').addClass('invalid');
}

//validate number
if ( pswd.match(/\d/) ) {
    $('#number').removeClass('invalid').addClass('valid');
} else {
    $('#number').removeClass('valid').addClass('invalid');
}*/