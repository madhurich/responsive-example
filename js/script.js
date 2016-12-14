$(document).ready(function(){
	$('#form').submit(function(){

		//get the values entered
		var name = $('input[name="name"]').val();
		var email = $('input[name="email"]').val();
		var phone = $('input[name="phone"]').val();

		//name validation to accept only letters and spaces
		function nameValid(name){
			var nameExp = /^[a-zA-Z\s]*$/;
			return nameExp.test(name);
		}

		//email validation to accept format name@domain.com
		function emailValid(email){
			var emailExp = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			return emailExp.test(email);
		}
		
		//if the input details are not valid and if they are empty
		if(name==="" || email==="" || phone==="" || !emailValid(email) || !nameValid(name)){
			alert('enter valid details');
			return false;
		}else{
			/*console.log(name, email, phone);*/
			
			$('input[name="name"]').val("");
			$('input[name="email"]').val("");
			$('input[name="phone"]').val("");

			return true;
		}

		
	});
});
	



