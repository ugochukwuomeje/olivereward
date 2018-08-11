$(document).ready(function(){

var preview_correct_sponsor = 0;
var preview_correct_upliner = 0;
var preview_correct_username = 0;
var preview_correct_payee = 0;
var preview_correct_trxpassword = 0;

$(".preview").attr('disabled', 'true');
					
$("#creditmember_loader").hide();
$("#updatebankdetals_loader").hide();
 $("#index_loader").hide();
 $("#losspassword_loader").hide();
 $("#login_loader").hide();
 $("#signup_loader").hide();
   $("#editcategory_loader").hide();
	$("#addcategory_loader").hide();
    $("#addsubcategory_loader").hide();
	 $("#token_request_loader").hide();
    $("#imgsection").hide();
    $("#imgcategory").hide();
    $("#imgsubcategory").hide();
     $("#addbrand_loader").hide();
     $("#disablebrand_loader").hide();
	 $("#enablebrand_loader").hide();  
	 $("#enablecategory_loader").hide();
	 $("#disablecategory_loader").hide();
     $("#updatesubcategory_loader").hide();
     $("#imgdisablesubcategory").hide();
     $("#removewishlist_loader").hide();
	 $("#removeproduct_loader").hide();
	 $("#editproduct_loader").hide();
	 $("#scrollable_loader").hide();
	 $("#class_loader").hide();
	 $("#lodingteller").hide();
	 $("#uploadproduct_loader").hide();
	 $("#country_loader").hide();
	 $("#bankaccount_loader").hide();
	 $("#payment_request_loader").hide();
	 $("#pay_loader").hide();
	 $('#preview_product').hide();
	 $('#cellimgpreview').hide();
	 $('#cellerrormessage').hide();
	 $("#img_approve_teller").hide();
	 $("#transfer_request_loader").hide();
	 $("#img_approve_withdrawal_request").hide();
	 $("#support_request_loader").hide();
	 $("#trx_loader").hide();
	 $("#username_loader").hide();/////////////////////gif loader for searching username
	 $("#sponsor_loader").hide();/////////////////////gif loader for searching sponsor
	 $("#upliner_loader").hide();/////////////////////gif loader for searching upliner
	 $("#payee_loader").hide();/////////////////////gif loader for searching payee
	 $("#payeetrxpassword_loader").hide();
	 $(".good").hide();
	 $("#changepassword_loader").hide();
	 $("#create_previlege_account_loader").hide();
	
	 
	 
  ////////////////////////////////////////////////////
  
   ///////////////////////////////////////////////////this section is for changing country
   
   $(".couintry").change(function()
	{
		$("#country_loader").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".state").find('option').remove();         
		$.ajax
		({
			type: "POST",
			url: "gets9tates.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#country_loader").hide();
				
			} 
		});
	});
	
	///////////////////////////////////////////////////this section is for changing country for update
   
   $(".updatecountry").change(function()
	{
		$("#country_loader").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".state").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "../getstates.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#country_loader").hide();
				$(".state").html(html);
			} 
		});
	});
   
   
  ////////////////////////////////////////////////////this section selects category when theirs is class change from the admin end
 $(".class").change(function()
	{
		$("#imgcategory").show();
		
		var id=$(this).val();
		
		var dataString = 'id='+ id;
		$(".category").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "../client2/clientoperation/getcategory.php",
			data: dataString,
			cache: false,
			success: function(retdata)
			{
				$("#imgcategory").hide();
				$(".category").html(retdata);  
				
			} 
		});
		
		
	});	
	////////////////////////////////////////////////////this section selects category when theirs is class change from the customer end
 $(".productclass").change(function()
	{
		$("#imgcategory").show();

		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".productcat").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "clientoperation/getcategory.php",
			data: dataString,
			cache: false,
			success: function(retdata)
			{
				$("#imgcategory").hide();
				$(".productcat").html(retdata);
				
			} 
		});
		
		
	});
	//////////////////////////////////////////////////// this section is for changing class for enabling category
 $(".classfordisablecategory").change(function()
	{
		
		$("#imgcategory").show();

		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".category").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "getcategoryfordisable.php",
			data: dataString,
			cache: false,
			success: function(retdata)
			{
				$("#imgcategory").hide();
				$(".category").html(retdata);
				
			} 
		});
		
		
	});	
   
   //////////////////////////////////this section is for disabling class
 $("#submit15").click(function(event){
	 $("#class_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "operation/category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#class_loader").hide();
			  if(data == 1)
			  {
				 alert("class succesfully deleted");
				 window.location.href = "deleteclass.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 });
 
 //////////////////////////////////this section is for enabling class
 $("#submit16").click(function(event){
	 $("#class_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#class_loader").hide();
			  if(data == 1)
			  {
				 alert("class succesfully enabled");
				 window.location.href = "enableclass.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
   

///////////////////////////////////////////////////this section is for changing category
 ////////////////////////////////////////////////////
 $(".category2").change(function() 
	{
		$("#imgcategory").show();

		var id=$(this).val();
		var dataString = 'id='+ id;
		$(".brandlist").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "getbrand.php",
			data: dataString,
			cache: false,
			success: function(retdata)
			{
				$("#imgcategory").hide();
				$("#brandlist").html(retdata);
				
			} 
		});
		
		
	});	
 
////////////////////////////////////////////////////this category is for  		
  $("#submit10").click(function(event){
	 $("#enablebrand_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#enablebrand_loader").hide();
			  if(data == 1)
			  {
				 alert("brand succesfully edit");
				 window.location.href = "editbrand.php";
			  }
			  else{
				  alert(data);
			  }
			  			
		}
 })
 });		
 ///////////////////////////////////////////////////////////////////this section updates subcategory		

  $("#submit12").click(function(event){
	 $("#updatesubcategory_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#updatesubcategory_loader").hide();
			  if(data == 1)
			  {
				 alert("subcategory succesfully updated");
				 window.location.href = "updatesubcategory.php";   
			  }
			  else{
				  alert(data);
			  }
			  			
		}
 })
 });		
		
///////////////////////////////////////////////////////////////////this section updates subcategory		

  $("#submit11").click(function(event){
	 $("#imgdisablesubcategory").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#imgdisablesubcategory").hide();
			  if(data == 1)
			  {
				 alert("subcategory succesfully disabled");
				 window.location.href = "disablesubcategory.php";
			  }
			  else{
				  alert(data);
			  }
			  			
		}
 })
 });		
				
		
		
///////////////////////////////////////////////////////////////////this section enables brand		

  $("#submit9").click(function(event){   
	 $("#enablebrand_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#enablebrand_loader").hide();
			  if(data == 1)
			  {
				 alert("brand succesfully enabled");
				 window.location.href = "enablebrand.php";
			  }
			  else{
				  alert(data);
			  }
			  			
		}
 })
 });		
		
////////////////////////////////////////////////////this section disables brand		

  $("#submit8").click(function(event){
	 $("#disablebrand_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#disablebrand_loader").hide();
			  if(data == 1)
			  {
				 alert("brand succesfully disabled");
				 window.location.href = "disablebrand.php";
			  }
			  else{
				  alert(data);
			  }
			  			
		}
 })
 });
	
	
 ////////////////////////////////////////////////////this section is for adding brand
  $("#submit7").click(function(event){
	 $("#addbrand_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#addbrand_loader").hide();
			  if(data == 1)
			  {
				 alert("brand succesfully added");
				 window.location.href = "addbrand.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 });
                 
///////////////////////////////////////////////////////////this is for registration
 $("#signup_button").click(function(event){
	 $("#signup_loader").show();
	  $("#signup_button").attr('disabled', 'true');
	event.preventDefault();
		$.ajax({
		  url: "operation/registerfile.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  $("#signup_button").removeAttr('disabled');
			  $("#signup_loader").hide();
			  if(data == 1)
			  {
				 alert("succesfully registered please login with your account details");
				 window.location.href="login.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
 //////////////////////////////this section is for adding category when submit button is clicked from the admin end
 $("#submit2").click(function(event){
	 $("#addcategory_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "operation/category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#addcategory_loader").hide();
			  if(data == 1)
			  {
				 alert("category succesfully added");
				 window.location.href = "uploadcategory.php";
				
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 });
 
 //////////////////////////////this section is for adding class
 $("#submit13").click(function(event){
	 $("#class_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "operation/category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#class_loader").hide();
			  if(data == 1)
			  {
				 alert("class succesfully added");
				 window.location.href = "uploadclass.php";
				
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
 
 //////////////////////////////this section is for editing class 
 $("#submit14").click(function(event){
	 $("#class_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "operation/category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#class_loader").hide();
			  if(data == 1)
			  {
				 alert("class successfully edited");
				 window.location.href = "editclass.php";
				
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
 
 ///////////////////////////////////////
  //////////////////////////////this section is for editting category
 $("#submit3").click(function(event){
	 $("#editcategory_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "operation/category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#editcategory_loader").hide();
			  if(data == 1)
			  {
				 alert("category succesfully editted");
				 window.location.href = "editcategory.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
//////////////////////////////////this section is for enabling category
 $("#submit4").click(function(event){
	 $("#enablecategory_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#enablecategory_loader").hide();
			  if(data == 1)
			  {
				 alert("category succesfully enabled");
				 window.location.href = "enablecategory.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
 //////////////////////////////////this section is for disabling category
 $("#submit5").click(function(event){
	 $("#disablecategory_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "operation/category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#disablecategory_loader").hide();
			  if(data == 1)
			  {
				 alert("category succesfully disabled");
				 window.location.href = "deletecategory.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
 ///////////////////////////////////////
 //////////////////////////////////this section is for adding subcategory
 $("#submit6").click(function(event){
	
	 $("#addsubcategory_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "category_operation.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#addsubcategory_loader").hide();
			  if(data == 1)
			  {
				 alert("subcategory succesfully added");
				 window.location.href = "addsubcategory.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
 ///////////////////////////////////////
 ///////////////////////////////////////////////////////////////////////this is for login
 $("#login_button").click(function(event){
	  $("#login_loader").show();
	 event.preventDefault();
	 $.ajax({
		  url: "operation/loginfile.php",
		  method: "POST",
		  data: $("#form2").serialize(),
		  success: function(data){
			  $("#login_loader").hide();
			  if(data == "1")
			  {
				  window.location.href = "client2/home.php";
			  }
			  else{
				  alert(data);
			  }
			 
			
		}
 })
 })
 
 ///////////////////////////////////////////////////////////////////////this is for admin user login
 $("#admin_login_button").click(function(event){
	 
	  $("#login_loader").show();
	 event.preventDefault();
	 $.ajax({
		  url: "operation/adminuserloginfile.php",
		  method: "POST",
		  data: $("#adminuserloginform").serialize(),
		  success: function(data){
			  $("#login_loader").hide();
			  if(data == "1")
			  {
				  window.location.href = "client2/home.php";
			  }
			  else{
				  alert(data);
			  }
			 
			
		}
 })
 })
 
 ///////////////////////////////////////////////////////////////////////this is for admin login
 $("#adminlogin_button").click(function(event){
	  $("#login_loader").show();
	 event.preventDefault();
	 $.ajax({
		  url: "operation/adminloginfile.php",
		  method: "POST",
		  data: $("#adminform").serialize(),
		  success: function(data){
			  $("#login_loader").hide();
			  if(data == "1")
			  {
				  window.location.href = "home.php";
			  }
			  else{
				  alert(data);
			  }
			 
			
		}
 })
 })
 ///////////////////////////////////////////////////////////////////////this is for sending email for loss password
 $("#lost_password").click(function(event){
	  $("#losspassword_loader").show();
	 event.preventDefault();
	 $.ajax({
		  url: "operation/losspassword.php",
		  method: "POST",
		  data: $("#form_lostpassword").serialize(),
		  success: function(data){
			  $("#losspassword_loader").hide();
			  
				  alert(data);
			  
		}
 })
 });
 ///////////////////////////////////////////////////////////////////////this is for changing password
 $("#btn_changepassword").click(function(event){
	  $("#changepassword_loader").show();
	 event.preventDefault();
	 $.ajax({
		  url: "operation/changepasswordfile.php",
		  method: "POST",
		  data: $("#form_lostpassword").serialize(),
		  success: function(data){
			  $("#changepassword_loader").hide();
			  if(data == "1")
			  {
				  alert("password succesfully changed");
				  window.location.href = "login.php";
			  }
			  else{
				  alert(data);
			  }
			 
			
		}
 })
 });
 
 ///////////////////////////////////////////////////////////////////////this is for changing password from dashboard
 $("#updatepasswordfromdashboard").click(function(event){
	  $("#changepassword_loader").show();
	 event.preventDefault();
	 $.ajax({
		  url: "../operation/changepasswordfromdashboardfile.php",
		  method: "POST",
		  data: $("#changepassword").serialize(),
		  success: function(data){
			  $("#changepassword_loader").hide();
			  if(data == "1")
			  {
				  alert("password succesfully changed");
				  window.location.href = "home.php";
			  }
			  else{
				  alert(data);
			  }
			 
			
		}
 })
 });
 
 ///////////////////////////////////////////////////////////////////////this is for changing in the admin password
 $("#updatepasswordfromadmindashboard").click(function(event){
	
	  $("#create_previlege_account_loader").show();
	   event.preventDefault();
	   $.ajax({
		  url: "operation/changepasswordfromadmindashboard.php",
		  method: "POST",
		  data: $("#adminchangepassword").serialize(),
		  success: function(data){
			  $("#create_previlege_account_loader").hide();
			  if(data == "1")
			  {
				  alert("password succesfully changed");
				  window.location.href = "updatepassword.php";
			  }
			  else{
				  alert(data);
			  }
			 
			
		}
 })
 });
 
///////////////////////////this section gets the clicked category
$("body").delegate(".category","click",function(event){
	 
	 event.preventDefault();
	
	 var cid = $(this).attr('cid');
$.ajax({
		  url: "php/action.php",
		  method: "POST",
		  data: {get_selected_category:1, cat_id:cid},
		  success: function(data){
			  $("#get_product").html(data);
		  }	
})
 })
 
//////////////////////////////this removes the product from wishlist
$(".wishlistremove").click(function(event){
	
	
	
	  $("#removewishlist_loader").show();
	  
	   var productid = $(this).attr('whishlistvalue');
	  
	 event.preventDefault();
	 $.ajax({
		  url: "removewishlist.php",
		  method: "POST",
		  data: {pid:productid},
		  method: "POST",
		  success: function(data){
			  $("#removewishlist_loader").hide();
			  alert(data);
			
		}
 })
 })
 //////////////////////////////this removes the product from product table from admin end
$(".deleteproduct").click(function(event){
	
	  $("#removeproduct_loader").show();
	  
	   var productid = $(this).attr('deleteproductid');
	 event.preventDefault();
	 $.ajax({
		  url: "deleteproductfile.php",
		  method: "POST",
		  data: {pid:productid},
		  method: "POST",
		  success: function(data){

			$("#removeproduct_loader").hide();			  
			  alert(data);
			   window.location.href = "deleteproduct.php";
			
		}
 })
 })
 //////////////////////////////this removes the product from product table from customer end
$(".deleteproduct").click(function(event){
	
	  $("#removeproduct_loader").show();
	  
	   var productid = $(this).attr('deleteproductid');
	 event.preventDefault();
	 $.ajax({
		  url: "admin/operations/deleteproductfile.php",
		  method: "POST",
		  data: {pid:productid},
		  method: "POST",
		  success: function(data){

			$("#removeproduct_loader").hide();			  
			  alert(data);
			   window.location.href = "deletecustomerproduct.php";
			
		}
 })
 });
 //////////////////////////////this section is for editing product from customer end
$(".deleteproduct").click(function(event){
	
	  $("#removeproduct_loader").show();
	  
	   var productid = $(this).attr('deleteproductid');
	 event.preventDefault();
	 $.ajax({
		  url: "admin/operations/deleteproductfile.php",
		  method: "POST",
		  data: {pid:productid},
		  method: "POST",
		  success: function(data){

			$("#removeproduct_loader").hide();			  
			  alert(data);
			   window.location.href = "deletecustomerproduct.php";
			
		}
 })
 });
 //////////////////////////////this section removes product from new arrival
$(".deleteproductnewarrival").click(function(event){
	
	  $("#removeproduct_loader").show();
	  
	   var productid = $(this).attr('deleteproductid');
	  
	 event.preventDefault();
	 $.ajax({
		  url: "deletenewarrivalproductfile.php",
		  method: "POST",
		  data: {pid:productid},
		  method: "POST",
		  success: function(data){

			$("#removeproduct_loader").hide();			  
			  alert(data);
			   window.location.href = "removenewarrival.php";
			
		}
 })
 })
 //////////////////////////////this section enables product in new arrival
$(".addproductnewarrival").click(function(event){
	
	  $("#removeproduct_loader").show();
	  
	   var productid = $(this).attr('deleteproductid');
	 event.preventDefault();
	 $.ajax({
		  url: "addnewarrivalproductfile.php",
		  method: "POST",
		  data: {pid:productid},
		  method: "POST",
		  success: function(data){

			$("#removeproduct_loader").hide();			  
			  alert(data);
			   window.location.href = "addnewarrivals.php";
			
		}
 })
 })
  //////////////////////////////this section removes product from recommended product
$(".removerecommendedproduct").click(function(event){
	
	  $("#removeproduct_loader").show();
	  
	   var productid = $(this).attr('deleteproductid');
	  
	 event.preventDefault();
	 $.ajax({
		  url: "removerecommendedproductfile.php",
		  method: "POST",
		  data: {pid:productid},
		  method: "POST",
		  success: function(data){

			$("#removeproduct_loader").hide();			  
			  alert(data);
			   window.location.href = "removerecommendedproduct.php";
			
		}
 })
 })
 //////////////////////////////this section enables product in new arrival
$(".addrecommendedproduct").click(function(event){
	
	  $("#removeproduct_loader").show();
	  
	   var productid = $(this).attr('deleteproductid');
	 event.preventDefault();
	 $.ajax({
		  url: "addrecommendedproductfile.php",
		  method: "POST",
		  data: {pid:productid},
		  method: "POST",
		  success: function(data){

			$("#removeproduct_loader").hide();			  
			  alert(data);
			   window.location.href = "addrecommendedproduct.php";
			
		}
 })
 })
 //////////////////////////////this section is for decreamenting the quantity
  $("body").delegate(".cart_quantity_down","click",function(event){
	 
	 event.preventDefault();
	 var productid = $(this).attr('id');
	 
$.ajax({
		  url: "decreament_cart.php",
		  method: "POST",
		  data: {pid:productid},
		  success: function(data){
			 //alert(data);
			 var properties = data.split(",");
			 var  productprice = properties[4];
			 var total_price = properties[6];
			 // alert(quantity);
			  var quantity = properties[3];
			  
			 document.getElementById("qty"+productid).value = quantity;
			 document.getElementById("total_price").innerHTML = total_price;
			 document.getElementById("cart_price"+productid).innerHTML = productprice;
			
		  }	
})
 });
 
 ////////////////////////////////////this is section is for increamenting the quantity
 $("body").delegate(".cart_quantity_up","click",function(event){
	 
	 event.preventDefault();
	 var productid = $(this).attr('id');
	 
$.ajax({
		  url: "increament_cart.php",
		  method: "POST",
		  data: {pid:productid},
		  success: function(data){
			  
			 var properties = data.split("_");
			 var productprice = properties[5];
			 var total_price = properties[7];
			 
			 var quantity  = properties[4];
			
			 document.getElementById("qty"+productid).value = quantity;
			 document.getElementById("total_price").innerHTML = total_price;
			 document.getElementById("cart_price"+productid).innerHTML = productprice;
			
		  }	
})
 })
 //////////////////////////this section is for edit product by category for admin section
 $(".viewproductbycat").click(function(event){
	
	  $("#editproduct_loader").show();
	  var categoryvalue = $(".category2").val();
	  
	   var operationid = $(this).attr('id');
	   
	   alert(operationid + categoryvalue);
	 event.preventDefault();
	 $.ajax({
		  url: "vieweditproduct.php",
		  method: "POST",
		  data: {opid:operationid },
		  method: "POST",
		  success: function(data){

			   $("#editproduct_loader").hide();			  
			   alert(data);
			   window.location.href = "editproduct.php";
			
		}
 })
 });
 
 ////////////////////////////////////////////////this sction is for uploading bank account
 $(".bankaccount").click(function(event){
	 $("#bankaccount_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "bankaccountfile.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#bankaccount_loader").hide();
			  if(data == 1)
			  {
				 alert("bank account successfully uploaded");
				 window.location.href = "dashboard.php";
			  }
			  else if(data == 200)
			  {
				  alert("login to upload bank details");
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 });
 ////////////////////////////////////////////////this sction is for updating bank account

 $(".updatebankaccount").click(function(event){
	 $("#bankaccount_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "updatebankaccount.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#bankaccount_loader").hide();
			  if(data == 1)
			  {
				 alert("bank account successfully updated");
				 window.location.href = "dashboard.php";
			  }
			  else if(data == 200)
			  {
				  alert("login to upload bank details");
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
 
 //////////////////////////////////// this section is for uploading scrollable images
 $("#uploadimage").on('submit',(function(e) {
			e.preventDefault();
			$("#scrollable_loader").show();
			$.ajax({
			url: "addscrollableproductfile.php", // Url to which the request is send
			type: "POST",             // Type of request to be send, called as method
			data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			success: function(data)   // A function to be called if request succeeds
			{
			 $("#scrollable_loader").hide();
			if(data == 1)
			  {
				 alert("product added to the database");
				 window.location.href = "addscrollableproduct.php";
			  }
			  else{
				  alert(data);
			  }
			}
			});
			}));
 

 
 //////////////////////////////////// this section is for uploading product to database from the admin end
 $("#uploadproduct").on('submit',(function(e) {
			e.preventDefault();
			$("#uploadproduct_loader").show();
			$.ajax({
			url: "addproduct_file.php", // Url to which the request is send
			type: "POST",             // Type of request to be send, called as method
			data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			success: function(data)   // A function to be called if request succeeds
			{
			 $("#uploadproduct_loader").hide();
			if(data == 1)
			  {
				 alert("product added to the database");
				 window.location.href = "add_product.php";
			  }
			  else{
				  alert(data);
			  }
			}
			});
			}));
	
//////////////////////////////////// this section is for uploading product to database from the customer end
 $("#customeruploadproduct").on('submit',(function(e) {
			e.preventDefault();
			$("#uploadproduct_loader").show();
			$.ajax({
			url: "clientoperation/addproduct_file.php", // Url to which the request is send
			type: "POST",             // Type of request to be send, called as method
			data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,        // To send DOMDocument or non processed data file it is set to false
			success: function(data)   // A function to be called if request succeeds
			{
			 $("#uploadproduct_loader").hide();
			if(data == 1)
			  {
				 alert("product added to the database");
				 window.location.href = "uploadproduct.php";
			  }
			  else{
				  alert(data);
			  }
			}
			});
			}));	

 
 //////////////////////////this section is for edit product by brand for admin section
 $(".viewproductbybrand").click(function(event){
	 
	 var brandvalue = $(".brandvalue").val();
	
	  $("#editproduct_loader").show();
	  
	   var operationid = $(this).attr('id');
	   alert(operationid + brandvalue);
	 event.preventDefault();
	 $.ajax({
		  url: "vieweditproduct.php",
		  method: "POST",
		  data: {pid:productid },
		  method: "POST",
		  success: function(data){

			$("#editproduct_loader").hide();			  
			  alert(data);
			   window.location.href = "editproduct.php";
			
		}
 })
 });
 ////////////////////////////////////////////////////this is pay section
  $("body").delegate(".pay","click",function(event){
	  $("#pay_loader").show();
	 event.preventDefault();
	 var id = $(this).attr('myid');
	$.ajax({
		  url: "payfile.php",
		  method: "POST",
		  data: {pay_id:id},
		  success: function(data){
			  
			   $("#pay_loader").hide();
			   if(data == 1)
			   {
				   alert("PAYMENT SUCCESSFUL!!!"); 
				   window.location.href = "dashboard.php";
			   }else{
				   alert(data);
			   }

			  $("."+id).attr('disabled','disabled');
		  }	
})
 }); 

 //////////////////////////////////////////////////////////////////this section is for approving teller
 $(".credit_client").click(function(event){
	 
	 
	 event.preventDefault();
	 var id = $(this).attr('clientid');
	 $("#img_approve_teller").show();
	$.ajax({ 
		  url: "operation/credit_client_file_from_admin.php",
		  method: "POST",
		  data: {id:id},
		  success: function(data){
			  
			 if(data == 1)
					  {
						  alert("client succesfully approved");
						  window.location.href = "home.php";
						  $("#img_approve_teller").hide();
					  }
					
					else{
						alert(data);
						
					}
		  }	
})
 });
 
 ///////////////////////////////////////////////////////this is for updating profile
 $("#updateprofile").click(function(event){
	 $("#signup_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "clientoperation/updateprofile.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#signup_loader").hide();
			  if(data == 1)
			  {
				 alert("succesfully updated");
				 window.location.href="updateprofile.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
 
 
  ///////////////////////////////////////////////////////this is for updating transaction password
 $("#updatetransationpassword").click(function(event){
	 $("#trx_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "clientoperation/updatetransactionpasswordfile.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#trx_loader").hide();
			  if(data == 1)
			  {
				 alert("succesfully updated");
				 window.location.href="updatetransactionpassword.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 })
 
 
 ///////////////////to preview product before uploading

	$("#pick_product").change(function() {
				
				
				//alert("come");
			$("#error_message").empty(); // To remove the previous error message
			var file = this.files[0];
			var imagefile = file.type;
			var match= ["image/jpeg","image/png","image/jpg"];
			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
			{
			$("#cellerrormessage").show();	
			$('#preview_product').attr('src','noimage.png');
			$("#error_message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
			return false;
			}
			else
			{
			var reader = new FileReader();
			reader.onload = imageIsLoaded;
			reader.readAsDataURL(this.files[0]);
			}
			});
			
			function imageIsLoaded(e) {
			$('#cellimgpreview').show();
	
			$('#preview_product').show();
			$('#image_preview').css("display", "block");
			$('#preview_product').attr('src', e.target.result);
			$('#preview_product').attr('width', '150px');
			$('#preview_product').attr('height', '130px');
			};

//////////////////////////////////////////////////////////////////////this section upload image
$("#tellerform").on('submit', function(event){
			event.preventDefault();
			
			
			$("#lodingteller").show();
			
				$.ajax({
				  url: "clientoperation/uploadtellerimagefile.php", // Url to which the request is send
				  type: "POST",             // Type of request to be send, called as method
				  data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				  contentType: false,       // The content type used when sending data to the server.
				  cache: false,             // To unable request pages to be cached
				  processData:false,
				  success: function(data){
					  $("#lodingteller").hide();
					  if(data == 1)
					  {
						  alert("teller successfully uploaded");
						  window.location.href = "home.php";
					    
					  }
					else if(data == 200){
						
						alert("please login before you can activate");
						  window.location.href = "index.php";
					}
					else{
						alert(data);
						window.location.href = "activateaccount.php";
					}
				}
		 })
		 });			
 /////////////////////////////////////////////////////////////////////// this section displays the teller when selected
 	$(function() {
			$("#tellerimg").change(function() {
				//alert("come");
			$("#message").empty(); // To remove the previous error message
			var file = this.files[0];
			var imagefile = file.type;
			var match= ["image/jpeg","image/png","image/jpg"];
			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
			{
			
			$('#previewing_dpteller').attr('src','noimage.png');
			$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
			return false;
			}
			else
			{
			$('#imgsection').show();
			var reader = new FileReader();
			reader.onload = imageIsLoaded1;
			reader.readAsDataURL(this.files[0]);
			}
			});
			});
			function imageIsLoaded1(e) {
			
			$('#image_preview').css("display", "block");
			$('#previewing_dpteller').attr('src', e.target.result);
			$('#previewing_dpteller').attr('width', '150px');
			$('#previewing_dpteller').attr('height', '130px');
			};
			
	 ////////////////////////////////////////////////this section is for uploading request for payment
 $("#payment_request").click(function(event){
	 $("#payment_request_loader").show();
	  $("#payment_request").attr('disabled', 'true');
	event.preventDefault();
		$.ajax({
		  url: "clientoperation/requestforpaymentfile.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#payment_request_loader").hide();
			  $("#payment_request").removeAttr('disabled');
			  if(data == 1)
			  {
				 alert("REQUEST SUBMITTED");
				 window.location.href = "home.php";
			  }
			  else if(data == 200)
			  {
				  alert("login to upload bank details");
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 });

 ////////////////////////////////////////////////this section is for generating token
 $("#token_request").click(function(event){
	 $("#token_request_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "clientoperation/generatetoken.php",
		  method: "POST",
		  success: function(data){
			  
			  document.getElementById("token-alert").innerHTML = data;
			  	 $("#token_request_loader").hide();
		}
 })
 });

 ////////////////////////////////////////////////this section creates the user roles
 $("#btn_create_previlege").click(function(event){
	 $("#create_previlege_account_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "operation/creatuserrole.php",
		  method: "POST",
		  data: $(".create_previlege_account_form").serialize(),
		  success: function(data){
			   $("#create_previlege_account_loader").hide();
			 if(data == 1)
			 {
				 alert("user created");
				  window.location.href = "createaccount.php";
				 
			 }else{
				 alert(data)
			 }
		}
 })
 });
 
////////////////////////////////////////////////this section is for uploading request for payment
 $("#transfer").click(function(event){
	 $("#transfer").attr('disabled', 'true');
	 $("#transfer_request_loader").show(); 
	event.preventDefault();
		$.ajax({
		  url: "clientoperation/transferfile.php",
		  method: "POST",
		  data: $("#transferform").serialize(),
		  success: function(data){
			  
			  $("#transfer_request_loader").hide();
			  $("#transfer").removeAttr('disabled');
			  if(data == 1)
			  {
				 alert("REQUEST SUBMITTED");
				 window.location.href = "home.php";
			  }
			  else if(data == 200)
			  {
				  alert("login to upload bank details");
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 });
 
 
 ////////////////////////////////////////////////////this section credits the client
  $("#creditmember").click(function(event){
	 $("#creditmember_loader").show();
	 $("#creditmember").attr('disabled', 'true');
	event.preventDefault();
		$.ajax({
		  url: "operation/creditmember.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#creditmember_loader").hide();
			  if(data == 1)
			  {
				 alert("member succesfully credited");
				 $("#creditmember").removeAttr('disabled', 'true');
				 window.location.href = "creditclient.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 });
 
 ////////////////////////////////////this section is for updating bank details
   $("#updatebankdetails").click(function(event){
	 $("#updatebankdetals_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "clientoperation/updatebankdetailsfile.php",
		  method: "POST",
		  data: $("#form_bankdetails").serialize(),
		  success: function(data){
			  
			  $("#updatebankdetals_loader").hide();
			  if(data == 1)
			  {
				 alert("succesfully updated");
				 window.location.href = "updatebankdetails.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 });
 
 //////////////////////////////////////////////////////////this section credits the client
  $("#amount").keyup(function(){
	  
		var id=$(this).val();
		var dataString = 'id='+ id;
		
		$.ajax
		({
			type: "POST",
			url: "operation/convertonaira.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				//alert(html);
				$(".amountnaira").html(html);
			} 
		});
	
 });
 
 //////////////////////////////////////////////////////////this section is transfer
  $("#amount_transfer").keyup(function(){
	  
		var id=$(this).val();
		var dataString = 'id='+ id;
		
		$.ajax
		({
			type: "POST",
			url: "../admin/operation/convertonaira.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				//alert(html);
				$(".amountnaira").html(html);
			} 
		});
	
 });
 
 //////////////////////////////////////////////////////////this section searches for the sponsor name details
  $("#sponsor").keyup(function(){
	  $("#sponsor_loader").show();
		var id=$(this).val();
		var dataString = 'sponsor='+ id;
		
		$.ajax
		({
			type: "POST",
			url: "operation/searchsponsor.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#sponsor_loader").hide();
				
				if(html == 1)
				{
					preview_correct_sponsor = 0;
					$(".displaysponsor_error").show();
					$(".displaysponsor_error").html("SPONSOR USERNAME IS INCORRECT");
					$(".displaysponsor_name").hide();
					
						$(".preview").attr('disabled', 'true');
						$(".bad").show();
						$(".good").hide();
						
				}else{
				
				preview_correct_sponsor = 1;
				$(".displaysponsor_name").show();
				$(".displaysponsor_name").html(html);
				$(".displaysponsor_error").hide();				
				if(preview_correct_sponsor==1 && preview_correct_upliner==1 && preview_correct_payee==1 && preview_correct_username==1 && preview_correct_trxpassword==1){
					$(".preview").removeAttr('disabled', 'true');
					$(".bad").hide();
					$(".good").show();
					
				}
				
			}
			}			
		});
	
 });
 
 //////////////////////////////////////////////////////////this section searches for the upliner details
  $("#upliner").keyup(function(){
	  $("#upliner_loader").show();
	  
		var id=$(this).val();
		var dataString = 'upliner='+ id;
		
		$.ajax
		({
			type: "POST",
			url: "operation/searchupliner.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#upliner_loader").hide();
				
				if(html == "1")
				{
					preview_correct_upliner = 0;
					
					$(".displayupliner_error").show();
					$(".displayupliner_error").html("UPLINER USERNAME IS INCORRECT");
					$(".displayupliner_name").hide();
					$(".preview").attr('disabled', 'true');
					$(".bad").show();
					$(".good").hide();
					
				}else if(html == "2"){
					$(".displayupliner_error").show();
					$(".displayupliner_error").html("THE UPLINER HAS TWO DOWNLINERS ALREADY TRY ANOTHER UPLINER");
					$(".displayupliner_name").hide();
					$(".preview").attr('disabled', 'true');
					$(".bad").show();
					$(".good").hide();
					preview_correct_upliner = 0;
				}
				else{
					
					preview_correct_upliner=1;
					$(".displayupliner_name").show();
					$(".displayupliner_name").html(html);
					$(".displayupliner_error").hide();
					if(preview_correct_sponsor==1 && preview_correct_upliner==1 && preview_correct_payee==1 && preview_correct_username==1 && preview_correct_trxpassword==1){
					$(".preview").removeAttr('disabled', 'true');
					$(".good").show();
					$(".bad").hide();
					}
				}
			} 
		});
	
 });
 
  //////////////////////////////////////////////////////////this section searches for the payee details
  $("#payeeusername").keyup(function(){
	  
	  $("#payee_loader").show();
		var id=$(this).val();
		var dataString = 'payeeusername='+ id;
		
		$.ajax
		({
			type: "POST",
			url: "operation/searchpayee.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				 $("#payee_loader").hide();
				if(html == 1)
				{
					preview_correct_payee = 0;
					
					$(".displaypayee_error").show();
					$(".displaypayee_error").html("PAYEE USERNAME IS INCORRECT");
					$(".displaypayee_name").hide();					
					$(".payeetransaction").attr('style','display: none');
					$(".payeetrxlabel").attr('style','display: none');
					$(".preview").attr('disabled', 'true');
					$(".bad").show();
					$(".good").hide();
				}else if(html == 2){
					preview_correct_payee = 0;
					
					$(".displaypayee_error").show();
					$(".displaypayee_error").html("PAYEE DOES NOT HAVE UPTO $100 PLEASE CREDIT YOUR ACCOUNT");
					$(".displaypayee_name").hide();					
					$(".payeetransaction").attr('style','display: none');
					$(".payeetrxlabel").attr('style','display: none');
					$(".preview").attr('disabled', 'true');
					$(".bad").show();
					$(".good").hide();
				}				
				else{
					
					preview_correct_payee = 1;
					var returnedString = html.split("__");
					$(".displaypayee_error").hide();
					$(".displaypayee_name").show();
					var payeename = returnedString[0];
					$(".displaypayee_name").html(payeename);
					
					var status = returnedString[1];
				
					if(status == 1)
					{
						 $(".payeetransaction").removeAttr("style");
						  $(".payeetrxlabel").removeAttr("style");
					}
					
					if(preview_correct_sponsor==1 && preview_correct_upliner==1 && preview_correct_payee==1 && preview_correct_username==1 && preview_correct_trxpassword==1){
					$(".preview").removeAttr('disabled', 'true');
					$(".good").show();
					$(".bad").hide();
					}
				}
			} 
		});
	
 });
 
 ////////////////////////////////////////////////////////////////////////////////this section is for searching trxpassword
 
  $("#payeetransaction").keyup(function(){
	  
	  $("#payeetrxpassword_loader").show();
		var varusername=$("#payeeusername").val();
		
		var vartrxpassword = $("#payeetransaction").val();
		
		
		$.ajax
		({
			type: "POST",
			url: "operation/searchpayeetransactionpassword.php",
			data: {username:varusername,trxpassword:vartrxpassword},
			cache: false,
			success: function(html)
			{
				 $("#payeetrxpassword_loader").hide();
				if(html == 1)
				{
					preview_correct_trxpassword = 0;
					
					$(".displaytransactionpassword_error").show();
					$(".displaytransactionpassword_error").html("TRANSACTION PASSWORD IS INCORRECT");
					$(".displaytransactionpassword_name").hide();					
					$(".preview").attr('disabled', 'true');
					$(".bad").show();
					$(".good").hide();
				}			
				else{
					
					preview_correct_trxpassword = 1;
					
					$(".displaytransactionpassword_error").hide();
					$(".displaytransactionpassword_name").show();
					
					$(".displaytransactionpassword_name").html("PAYEE TRANSACTION PASSWORD IS CORRECT");

					
					if(preview_correct_sponsor==1 && preview_correct_upliner==1 && preview_correct_payee==1 && preview_correct_username==1 && preview_correct_trxpassword==1){
					$(".preview").removeAttr('disabled', 'true');
					$(".good").show();
					$(".bad").hide();
					}
				}
			} 
		});
	
 });  
 
 
  //////////////////////////////////////////////////////////////////this section is for approving withdrawal
 $(".approvewithdrawalrequest").click(function(event){

	 event.preventDefault();
	 var username = $(this).attr('approveusername');
	 var trxid = $(this).attr('approveusertrxid');
	 $("#img_approve_withdrawal_request").show();
	$.ajax({ 
		  url: "operation/approverequest.php",
		  method: "POST",
		  data: {username:username, trxid:trxid},
		  success: function(data){
			  
			 if(data == 1)
					  {
						  alert("client succesfully approved");
						  window.location.href = "viewwithdrawalrequest.php";
						  $("#img_approve_withdrawal_request").hide();
					  }
					
					else{
						alert(data);
						
					}
		  }	
})
 });
 
  //////////////////////////////////////////////////////////////////this section is for approving 
 $(".approvehim").click(function(event){

	 event.preventDefault();
	 var username = $(this).attr('myusername');
	 var table = $(this).attr('table');
	 var approvestage = $(this).attr('stage');
	 
	 $("#img_approve_withdrawal_request").show();
	$.ajax({ 
		  url: "operation/approveincentive.php",
		  method: "POST",
		  data: {username:username, table:table},
		  success: function(data){
			  
			 if(data == 1)
					  {
						  alert("client succesfully approved");
						  window.location.href = "qualifiedmembers.php?stage="+approvestage;
						  $("#img_approve_withdrawal_request").hide();
					  }
					
					else{
						alert(data);
						
					}
		  }	
})
 });
 
 
 ////////////////////////////////////////////////////this section is for submiting support from client end
  $("#submitsupport").click(function(event){
	 
	 $("#support_request_loader").show();
	event.preventDefault();
		$.ajax({
		  url: "clientoperation/submit_supportfile.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#support_request_loader").hide();
			  if(data == 1)
			  {
				 alert("message succesfully sent");
				 window.location.href = "support.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 });         
 
  ////////////////////////////////////////////////////this section is for replying support from admin end
  $("#replybutton").click(function(event){
	 
	 $("#img_approve_withdrawal_request").show();
	event.preventDefault();
		$.ajax({
		  url: "operation/reply.php",
		  method: "POST",
		  data: $("form").serialize(),
		  success: function(data){
			  
			  $("#img_approve_withdrawal_request").hide();
			  if(data == 1)
			  {
				 alert("message succesfully sent");
				 window.location.href = "support.php";
			  }
			  else{
				  alert(data);
			  }
			  
			
		}
 })
 });
 
 
 //////////////////////////////////////////////////this section is for checking whether username is already used
 $("#username").keyup(function(){
	  $("#username_loader").show();
		var id=$(this).val();
		var dataString = 'username='+ id;
		
		$.ajax
		({
			type: "POST",
			url: "operation/searchusername.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
					$("#username_loader").hide();
					if(html == 2){
						
					preview_correct_username = 0;
					
					$(".displayincorrectusername_name").show();
					$(".displayincorrectusername_name").html("USERNAME IS ALREADY IN USE TRY ANOTHER USERNAME");
					$(".displaycorrectusername_name").hide();
					$(".preview").attr('disabled', 'true');
					$(".bad").show();
					$(".good").hide();
					
				}else{
					
						preview_correct_username = 1;
					
						$(".displaycorrectusername_name").show();
						$(".displaycorrectusername_name").html("USERNAME APPROVED");
						$(".displayincorrectusername_name").hide();
						
						if(preview_correct_sponsor==1 && preview_correct_upliner==1 && preview_correct_payee==1 && preview_correct_username==1 && preview_correct_trxpassword==1){

						$(".preview").removeAttr('disabled', 'true');
						$(".bad").hide();
						$(".good").show();
						
					}
					
				}
			} 
		});
	
 });
});