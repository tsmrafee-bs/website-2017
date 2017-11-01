<script type="text/javascript">
   function checkpayment(){
	   	if(fn_validation('phone*appsid*unit')==0) return;
		var mobile=$('#phone').val();
		var appsid=$('#appsid').val();
		var unit=$('#unit').val();
		
		var data ="action=actionquaerypagescheckdata&mobile="+mobile+"&appsid="+appsid+"&unit="+unit;
		//alert(data); return;
		http.open( "POST","process/varification.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_check_result_response;
		http.send(data); 
	}
	
	
	function fnc_check_result_response()
	{
		if(http.readyState == 4)
		{ 
			var response=http.responseText;
			window.location='index.php?act=process/finalprofile';
		 }
	}	 

</script>
<section class="main">
                <div class="container">
               <?php include("process/uppermenu.php"); ?>                
             <div class="panel panel-default" style="margin:0px; padding:0px;">
                 <div class="panel-heading"  style=" font-weight:bolder; color:#A27126; font-size:16px;">
                    Applicant Login
                </div>
              <div class="panel-body">
                            <table class="table table-bordered table-striped"> 
                          
                            <tr>
                                <td>Applicant`s Phone Number</td>
                                <td><input name='phone' id="phone" required type='text' class='form-control' placeholder="Enter Phone Number" /></td>
                            </tr>
                            <tr>
                                <td>Application ID</td>
                                <td><input name='appsid' id='appsid' required type='text' class='form-control' placeholder="Enter Application Id" /></td>
                            </tr>
                            <tr>
                                <td>Unit</td>
                                <td>
                                     <select id="unit" name="unit" class="form-control">
										<option value=""> >-Select Unit-< </option>
										<?php foreach($unit AS $key=>$val) {?>
                                             <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                         <?php } ?>
                                     </select>
                                </td>
                            </tr>
							
                            <tr>
                                <td colspan="2" style="text-align:right;">
                                    <button type="button" onclick="checkpayment()" class="btn btn-primary" name="btn_check">  Login</button>
                                </td>
                            </tr>
                        </table>
                 
             </div>
        </div>
   
</div>
<script type="text/javascript">
    $().ready(function () {
        $("#form_check").validate({
            rules: {
                cell_phone: {
                    required: true,
                    minlength: 11,
                    maxlength: 11
                },
                payment_id: {
                    required: true,
                    minlength: 8,
                    maxlength: 8
                }
            },
            messages: {
                
                payment_id: {
                    required: "<span style='color:red; font-size:10px;'>Please enter Application ID</span>"
                },
                cell_phone: {
                    required: "<span style='color:red; font-size:10px;'>Please enter Phone Number</span>"
                }
            }
        });
    });
</script>       	

</section>