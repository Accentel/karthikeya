<?php //include('config.php');
session_start();
if($_SESSION['user'])
{
$ses=$_SESSION['user'];
 include('../db/insert_roomtarrif.php');
include("header.php");?>
<script>
function showtest(str){
	
	if(str=="Yes"){
		document.getElementById('gtest1').style.display="block";
	}else{
		document.getElementById('gtest1').style.display="none";
	}
	
	
	
}
function showuser(str)
{
	
		
if (str=="")
  {
  document.getElementByName("section").innerHTML="";
  return;
  } 
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
   // document.getElementById("country5").innerHTML=xmlhttp.responseText;
	//document.getElementById("country5").innerHTML=show;
	var show=xmlhttp.responseText;
	//alert(show);
	document.getElementById("rtype").innerHTML=show;
	//document.location.reload();
    }
  }
xmlhttp.open("GET","get_rtype.php?q="+str,true);
xmlhttp.send();
}


function showuser1(str)
{
	
		var lno=document.getElementById('ltype').value;
if (str=="")
  {
  document.getElementByName("section").innerHTML="";
  return;
  } 
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
   // document.getElementById("country5").innerHTML=xmlhttp.responseText;
	//document.getElementById("country5").innerHTML=show;
	var show=xmlhttp.responseText;
	//alert(show);
	document.getElementById("rno").innerHTML=show;
	//document.location.reload();
    }
  }
xmlhttp.open("GET","get_rno.php?q="+str+"&ltype="+lno,true);
xmlhttp.send();
}


function showuser2(str)
{
	
		var lno=document.getElementById('ltype').value;
		var rtype=document.getElementById('rtype').value;
		
if (str=="")
  {
  document.getElementByName("section").innerHTML="";
  return;
  } 
  
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
   // document.getElementById("country5").innerHTML=xmlhttp.responseText;
	//document.getElementById("country5").innerHTML=show;
	var show=xmlhttp.responseText;
	//alert(show);
	document.getElementById("bno").innerHTML=show;
	//document.location.reload();
    }
  }
xmlhttp.open("GET","get_bno.php?q="+str+"&ltype="+lno+"&rtype="+rtype,true);
xmlhttp.send();
}
</script>
			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Edit Room Tarif </div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="#">Ward</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Edit Room Tarif  </li>
                            </ol>
                        </div>
                    </div>
					<?php 
					 $rtid=$_GET['id'];
					 $rtid=$crud->my_simple_crypt($rtid,'d'); ?>
					<?php


 $a="select a.id as lid,a.lname,b.id as rid,b.rtype,c.id as rmid,c.roomno,d.id as did,d.bedno from locations a,roomtype b,
					rooms c,beds d,room_tariff e where a.id=e.LOCATION and b.id=e.ROOM_TYPE and c.id=e.ROOM_NO
					and d.id=e.NO_BEDS and e.ROOM_ID='$rtid'";
					
					
					$sql = mysqli_query($link,$a);
if($sql)
{
	$row = mysqli_fetch_array($sql);
	
	//$roomno = $row['ROOM_NO'];
	//echo $locaid = $row['LOCATION'];
	//$noofbeds = $row['NO_BEDS'];
	//$roomtype = $row['ROOM_TYPE'];
	//$ac1 = $row['AC'];
	//$oxy1 = $row['OXYGEN'];
	//$fbed1 = $row['FBED'];
	//$rmfee = $row['ROOM_FEE'];
	//$mafee = $row['MAINT_FEE'];
	//$nufee = $row['NURSE_FEE'];
	//$otfee = $row['OTHER_FEE'];
	//$locname = $row['FLOOR_NAME'];
	//$rotype = $row['ROOMTYPE'];
}

 $a="select e.ROOM_ID,a.id as lid,a.lname,b.id as rid,b.rtype,c.id as rmid,c.roomno,d.id as bid,d.bedno,e.ac,e.ROOM_FEE,e.DOCT_FEE,e.NURSE_FEE,e.DMO_FEE,e.OXYGEN,e.FBED from locations a,roomtype b,
					rooms c,beds d,room_tariff e where a.id=e.LOCATION and b.id=e.ROOM_TYPE and c.id=e.ROOM_NO
					and d.id=e.NO_BEDS and e.ROOM_ID='$rtid'";
					
					
					$sql = mysqli_query($link,$a);
					$r=mysqli_fetch_array($sql);
?>

					
					
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Edit Room Tarif</header>
                                     <button id = "panel-button" 
				                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
				                           data-upgraded = ",MaterialButton">
				                           <i class = "material-icons">more_vert</i>
				                        </button>
				                        <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
				                           data-mdl-for = "panel-button">
				                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
				                        </ul>
                                </div>
								<?php?>
                                <div class="card-body" id="bar-parent">
                                    <form action="" id="form_sample_1" class="form-horizontal" method="post">
                                        <div class="form-body">
										<div class="form-group row">
                                                <label class="control-label col-md-3">Location
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                    <select name="ltype"  id="ltype" class="form-control " required onChange="showuser(this.value)">
													
													<option value="<?php echo $r['lid'];?>"><?php echo $r['lname'];?></option>
													<option value="">Select Location</option>
													<?php foreach($result as $key=>$v){ ?>
													<option value="<?php echo $v['id']; ?>"><?php echo $v['lname']; ?></option>
													<?php }?>
													</select>
                                            </div>
											<label class="control-label col-md-3">Room Type
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                    <select name="rtype"  id="rtype" class="form-control " required onChange="showuser1(this.value)">
													<option value="<?php echo $r['rid'];?>"><?php echo $r['rtype'];?></option>
													<option value="">Select Room Type</option>
													
													</select>
                                            </div>
                                            </div>		
										
										<div class="form-group row">
                                                
											<label class="control-label col-md-3">Room No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                    <select name="rno"  id="rno" class="form-control " required onChange="showuser2(this.value)">
													<option value="<?php echo $r['rmid'];?>"><?php echo $r['roomno'];?></option>
													<option value="">Select Room No</option>
													
													</select>
                                            </div>
										
											<label class="control-label col-md-3">Bed No
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
												<select name="bno"  id="bno" class="form-control " required>
												<option value="<?php echo $r['bid'];?>"><?php echo $r['bedno'];?></option>
													<option value="">Select Room No</option>
													
													</select>
                                                    
													
													
                                            </div>
                                            </div>	
											
													<div class="form-group row">
                                                
											<label class="control-label col-md-3">Ac Room
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3"><?php
												


												 $ac=$r['ac'];
												if($ac=='Yes'){
												?>
												
                                                    <input type="radio" name="ac" checked value="Yes"/>&nbsp;&nbsp;Yes &nbsp;&nbsp; <input type="radio" name="ac"  value="No"/>&nbsp;&nbsp;No
												<?php } else {?>
                                                    <input type="radio" name="ac"  value="Yes"/>&nbsp;&nbsp;Yes &nbsp;&nbsp; <input type="radio" name="ac" checked  value="No"/>&nbsp;&nbsp;No
												<?php }?>
                                            </div>
											
											
											<label class="control-label col-md-3">Oxigen Avaliable
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
												<?php 
											 $OXYGEN=$r['OXYGEN'];
												if($OXYGEN=='Yes'){
												?>
												<input type="radio" name="oxigen" checked value="Yes"/>&nbsp;&nbsp;Yes &nbsp;&nbsp; <input type="radio" name="oxigen"  value="No"/>&nbsp;&nbsp;No
												<?php } else {?>  
												<input type="radio" name="oxigen"  value="Yes"/>&nbsp;&nbsp;Yes &nbsp;&nbsp; <input type="radio" name="oxigen" checked  value="No"/>&nbsp;&nbsp;No
												<?php }?>
													
                                            </div>
                                            </div>		
										<div class="form-group row">
                                                
											<label class="control-label col-md-3">Functional Bed
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
												<?php 
												
												//,e.ROOM_FEE,e.DOCT_FEE,e.NURSE_FEE,e.DMO_FEE
											 $FBED=$r['FBED'];
												if($FBED=='Yes'){
												?>
												
                                                    <input type="radio" name="fbed" checked  value="Yes"/>&nbsp;&nbsp;Yes &nbsp;&nbsp; <input type="radio" name="fbed"  value="No"/>&nbsp;&nbsp;No
												<?php } else {?>          
 <input type="radio" name="fbed"  value="Yes"/>&nbsp;&nbsp;Yes &nbsp;&nbsp; <input type="radio" name="fbed" checked  value="No"/>&nbsp;&nbsp;No
												<?php }?>          
										  </div>
											
											
                                            </div>		
												<div class="form-group row">
                                                
											<label class="control-label col-md-3">Bed Charges
                                                    <span class="required"> * </span>
                                                </label>
												
												
												
                                                <div class="col-md-3">
                                                    <input type="text" name="bedcharge" value="<?php echo $r['ROOM_FEE'];?>" id="bedcharge" class="form-control" required/>
                                            </div>
											<label class="control-label col-md-3">DMO Charges
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
												
                                                    <input type="text" name="dmocharge" id="dmocharge" value="<?php echo  $DMO_FEE=$r['DMO_FEE'];?>" class="form-control" required/>
                                            </div>
											
                                            </div>	

										<div class="form-group row">
                                                
											<label class="control-label col-md-3">Nursing Charges
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                    <input type="text" name="nursecharge" id="nursecharge" value="<?php echo  $r['NURSE_FEE'];?>" class="form-control" required/>
                                            </div>
											<label class="control-label col-md-3">Doctor Con. Charges
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                    <input type="text" name="doctcharge" id="doctcharge" value="<?php echo  $r['DOCT_FEE'];?>"  class="form-control" required/>
                                            </div>
											
                                            </div>		
											 <input type="hidden" name="id" id="id" value="<?php echo  $r['ROOM_ID'];?>"  class="form-control" required/>
                                       
											
                                        <div class="form-group row">
                                                <input name="user" id="user" type="hidden"  class="form-control input-height" value="<?php echo $ses; ?>" /> 
                                            </div>
                                           
											<div class="form-actions">
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" name="submit2" class="btn btn-info">Update</button>
                                                    <a href="roomtarriflist.php"><button type="button" class="btn btn-default">Cancel</button></a>
                                                </div>
                                            	</div>
                                        	</div>
										</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			
				 
            <!-- end page content -->
            <!-- start chat sidebar -->
            <div class="chat-sidebar-container" data-close-on-body-click="false">
                <div class="chat-sidebar">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#quick_sidebar_tab_1" class="nav-link active tab-icon"  data-toggle="tab"> <i class="material-icons">chat</i>Chat
                                    <span class="badge badge-danger">4</span>
                                </a>
                        </li>
                        <li class="nav-item">
                            <a href="#quick_sidebar_tab_3" class="nav-link tab-icon"  data-toggle="tab"> <i class="material-icons">settings</i> Settings
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- Start Doctor Chat --> 
 						<div class="tab-pane active chat-sidebar-chat in active show" role="tabpanel" id="quick_sidebar_tab_1">
                        	<div class="chat-sidebar-list">
	                            <div class="chat-sidebar-chat-users slimscroll-style" data-rail-color="#ddd" data-wrapper-class="chat-sidebar-list">
	                                <div class="chat-header"><h5 class="list-heading">Online</h5></div>
	                                <ul class="media-list list-items">
	                                    <li class="media"><img class="media-object" src="img/doc/doc3.jpg" width="35" height="35" alt="...">
	                                        <i class="online dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">John Deo</h5>
	                                            <div class="media-heading-sub">Spine Surgeon</div>
	                                        </div>
	                                    </li>
	                                    <li class="media">
	                                        <div class="media-status">
	                                            <span class="badge badge-success">5</span>
	                                        </div> <img class="media-object" src="img/doc/doc1.jpg" width="35" height="35" alt="...">
	                                        <i class="busy dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">Rajesh</h5>
	                                            <div class="media-heading-sub">Director</div>
	                                        </div>
	                                    </li>
	                                    <li class="media"><img class="media-object" src="img/doc/doc5.jpg" width="35" height="35" alt="...">
	                                        <i class="away dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">Jacob Ryan</h5>
	                                            <div class="media-heading-sub">Ortho Surgeon</div>
	                                        </div>
	                                    </li>
	                                    <li class="media">
	                                        <div class="media-status">
	                                            <span class="badge badge-danger">8</span>
	                                        </div> <img class="media-object" src="img/doc/doc4.jpg" width="35" height="35" alt="...">
	                                        <i class="online dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">Kehn Anderson</h5>
	                                            <div class="media-heading-sub">CEO</div>
	                                        </div>
	                                    </li>
	                                    <li class="media"><img class="media-object" src="img/doc/doc2.jpg" width="35" height="35" alt="...">
	                                        <i class="busy dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">Sarah Smith</h5>
	                                            <div class="media-heading-sub">Anaesthetics</div>
	                                        </div>
	                                    </li>
	                                    <li class="media"><img class="media-object" src="img/doc/doc7.jpg" width="35" height="35" alt="...">
	                                        <i class="online dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">Vlad Cardella</h5>
	                                            <div class="media-heading-sub">Cardiologist</div>
	                                        </div>
	                                    </li>
	                                </ul>
	                                <div class="chat-header"><h5 class="list-heading">Offline</h5></div>
	                                <ul class="media-list list-items">
	                                    <li class="media">
	                                        <div class="media-status">
	                                            <span class="badge badge-warning">4</span>
	                                        </div> <img class="media-object" src="img/doc/doc6.jpg" width="35" height="35" alt="...">
	                                        <i class="offline dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">Jennifer Maklen</h5>
	                                            <div class="media-heading-sub">Nurse</div>
	                                            <div class="media-heading-small">Last seen 01:20 AM</div>
	                                        </div>
	                                    </li>
	                                    <li class="media"><img class="media-object" src="img/doc/doc8.jpg" width="35" height="35" alt="...">
	                                        <i class="offline dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">Lina Smith</h5>
	                                            <div class="media-heading-sub">Ortho Surgeon</div>
	                                            <div class="media-heading-small">Last seen 11:14 PM</div>
	                                        </div>
	                                    </li>
	                                    <li class="media">
	                                        <div class="media-status">
	                                            <span class="badge badge-success">9</span>
	                                        </div> <img class="media-object" src="img/doc/doc9.jpg" width="35" height="35" alt="...">
	                                        <i class="offline dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">Jeff Adam</h5>
	                                            <div class="media-heading-sub">Compounder</div>
	                                            <div class="media-heading-small">Last seen 3:31 PM</div>
	                                        </div>
	                                    </li>
	                                    <li class="media"><img class="media-object" src="img/doc/doc10.jpg" width="35" height="35" alt="...">
	                                        <i class="offline dot"></i>
	                                        <div class="media-body">
	                                            <h5 class="media-heading">Anjelina Cardella</h5>
	                                            <div class="media-heading-sub">Physiotherapist</div>
	                                            <div class="media-heading-small">Last seen 7:45 PM</div>
	                                        </div>
	                                    </li>
	                                </ul>
	                            </div>
                            </div>
                            <div class="chat-sidebar-item">
                                <div class="chat-sidebar-chat-user">
                                    <div class="page-quick-sidemenu">
                                        <a href="javascript:;" class="chat-sidebar-back-to-list">
                                            <i class="fa fa-angle-double-left"></i>Back
                                        </a>
                                    </div>
                                    <div class="chat-sidebar-chat-user-messages">
                                        <div class="post out">
                                            <img class="avatar" alt="" src="img/dp.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:10</span>
                                                <span class="body-out"> could you send me menu icons ? </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="img/doc/doc5.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Jacob Ryan</a> <span class="datetime">9:10</span>
                                                <span class="body"> please give me 10 minutes. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="img/dp.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:11</span>
                                                <span class="body-out"> ok fine :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="img/doc/doc5.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Jacob Ryan</a> <span class="datetime">9:22</span>
                                                <span class="body">Sorry for
													the delay. i sent mail to you. let me know if it is ok or not.</span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="img/dp.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:26</span>
                                                <span class="body-out"> it is perfect! :) </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="img/dp.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Kiran Patel</a> <span class="datetime">9:26</span>
                                                <span class="body-out"> Great! Thanks. </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="img/doc/doc5.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span> <a href="javascript:;" class="name">Jacob Ryan</a> <span class="datetime">9:27</span>
                                                <span class="body"> it is my pleasure :) </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-sidebar-chat-user-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Type a message here...">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn deepPink-bgcolor">
                                                    <i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Doctor Chat --> 
 						<!-- Start Setting Panel --> 
 						<div class="tab-pane chat-sidebar-settings" role="tabpanel" id="quick_sidebar_tab_3">
                            <div class="chat-sidebar-settings-list slimscroll-style">
                                <div class="chat-header"><h5 class="list-heading">Layout Settings</h5></div>
	                            <div class="chatpane inner-content ">
									<div class="settings-list">
					                    <div class="setting-item">
					                        <div class="setting-text">Sidebar Position</div>
					                        <div class="setting-set">
					                           <select class="sidebar-pos-option form-control input-inline input-sm input-small ">
	                                                <option value="left" selected="selected">Left</option>
	                                                <option value="right">Right</option>
                                            	</select>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Header</div>
					                        <div class="setting-set">
					                           <select class="page-header-option form-control input-inline input-sm input-small ">
	                                                <option value="fixed" selected="selected">Fixed</option>
	                                                <option value="default">Default</option>
                                            	</select>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Sidebar Menu </div>
					                        <div class="setting-set">
					                           <select class="sidebar-menu-option form-control input-inline input-sm input-small ">
	                                                <option value="accordion" selected="selected">Accordion</option>
	                                                <option value="hover">Hover</option>
                                            	</select>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Footer</div>
					                        <div class="setting-set">
					                           <select class="page-footer-option form-control input-inline input-sm input-small ">
	                                                <option value="fixed">Fixed</option>
	                                                <option value="default" selected="selected">Default</option>
                                            	</select>
					                        </div>
					                    </div>
					                </div>
									<div class="chat-header"><h5 class="list-heading">Account Settings</h5></div>
									<div class="settings-list">
					                    <div class="setting-item">
					                        <div class="setting-text">Notifications</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
									                  for = "switch-1">
									                  <input type = "checkbox" id = "switch-1" 
									                     class = "mdl-switch__input" checked>
									               	</label>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Show Online</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
									                  for = "switch-7">
									                  <input type = "checkbox" id = "switch-7" 
									                     class = "mdl-switch__input" checked>
									               	</label>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Status</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
									                  for = "switch-2">
									                  <input type = "checkbox" id = "switch-2" 
									                     class = "mdl-switch__input" checked>
									               	</label>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">2 Steps Verification</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
									                  for = "switch-3">
									                  <input type = "checkbox" id = "switch-3" 
									                     class = "mdl-switch__input" checked>
									               	</label>
					                            </div>
					                        </div>
					                    </div>
					                </div>
                                    <div class="chat-header"><h5 class="list-heading">General Settings</h5></div>
                                    <div class="settings-list">
					                    <div class="setting-item">
					                        <div class="setting-text">Location</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
									                  for = "switch-4">
									                  <input type = "checkbox" id = "switch-4" 
									                     class = "mdl-switch__input" checked>
									               	</label>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Save Histry</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
									                  for = "switch-5">
									                  <input type = "checkbox" id = "switch-5" 
									                     class = "mdl-switch__input" checked>
									               	</label>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="setting-item">
					                        <div class="setting-text">Auto Updates</div>
					                        <div class="setting-set">
					                            <div class="switch">
					                                <label class = "mdl-switch mdl-js-switch mdl-js-ripple-effect" 
									                  for = "switch-6">
									                  <input type = "checkbox" id = "switch-6" 
									                     class = "mdl-switch__input" checked>
									               	</label>
					                            </div>
					                        </div>
					                    </div>
					                </div>
	                        	</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

header('Location:../../index.php?authentication failed');

}

?>