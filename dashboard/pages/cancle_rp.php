<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");
date_default_timezone_set('Asia/Kolkata');?>
	

<script>
function reportxx(){
	var fdate = document.getElementById("fromdate").value;
	var tdate = document.getElementById("todate").value;
	var sess = document.getElementById("ses").value;
    var ctype = document.getElementById("ctype").value;

    if(ctype){ 

	window.open('canclview.php?s_date='+fdate+'&e_date='+tdate+'&sess ='+sess+'&ctype='+ctype,'Mywindow','width=1020,height=800,toolbar=no,menubar=no');
    }
    else{
        alert('please select Particular Type ');
    }

}
</script>		

			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                </li>
                                <li class="active">Patients Report</li>
                            </ol>
                        </div>
                    </div>
					
					<div class="row" style="display:block">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Cancellation Report</header>
                                    <button id = "panel-button3" 
				                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
				                           data-upgraded = ",MaterialButton">
				                           <i class = "material-icons">more_vert</i>
				                        </button>
				                        <!--<ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
				                           data-mdl-for = "panel-button3">
				                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
				                        </ul>-->
                                </div>
								
								<form name="form" method="post" >
                                <div class="card-body " id="bar-parent2">
                                  	          <div class="form-group row">
                                               
                                            <label class="control-label col-md-2">From Date
                                                    <span class="required"> * </span>
                                            </label>
                                               <div class="col-md-3">
                                                    
		                                                <input class="form-control " size="16" placeholder="Join Date" type="date" value="<?php echo date('Y-m-d'); ?>" name="fromdate" id="fromdate">
		                                                <!--<span class="input-group-addon"><span class="fa fa-calendar"></span>--></span>
	                                            	
	                                            
	                                            </div>
											
											
											</div>
											<div class="form-group row">
                                               
                                            <label class="control-label col-md-2">To Date
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                    
		                                                <input class="form-control " size="16" placeholder="To Date" type="date" value="<?php echo date('Y-m-d'); ?>" name="todate" id="todate">
		                                                <!--<span class="input-group-addon"><span class="fa fa-calendar"></span>--></span>                                    
	                                            </div>
												
											</div>
											
									   
									   <input type="hidden" value="<?php echo $ses?>" class="form-control" name="ses" id="ses" >
										
										
    
                                </div>
                                <div class="form-group">
	                                            <label style="margin-left: 25px;">Particular Type</label>
                                                <span class="required"> * </span>
                                                <select  class="form-control" style="width:500px; display:inline-block; margin-left:90px; margin: top -200px;"  name="ctype" id="ctype" required>
	                                                <option value="" >Select  Name</option>
                                                    <option value="op">op bill</option>
                                                    <option value="lab">lab bill</option>
                                                    <option value="procedure">proceducer lab bill</option>
                                                    
	                                                
	                                                </select>
	                                        </div>
	                                              </div>
									   
									   <input type="hidden" value="<?php echo $ses?>" class="form-control" name="ses" id="ses" >
										
										
                                </div>
								<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-4 col-md-9">
                                                    <input type="submit" class="btn btn-info" name="submit" value="Report"  onclick="reportxx();">
                                                    <button type="button" class="btn btn-default" onclick="javascript:location.href='dashboard.php'">Cancel</button>
                                                </div>
                                            	</div>
                                        	</div>
                            </div>
                        </div>
                    </div>
					
					</form>
					
					
					
              
            <!-- end page content -->
            <!-- start chat sidebar -->
			
			
            
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
       <?php include("footer.php");?>
	    <?php 

}else

{

session_destroy();

session_unset();

header('Location:../../index.php');

}

?>