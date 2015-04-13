<?php include_once("include/header.php"); //unset($_POST);
		$q = new query();
		if(isset($_REQUEST['myaction'])){
		$myaction=$_REQUEST['myaction'];
		$id=$_REQUEST['id']; }
		$dis_tab_id = "ta1";
		$btn_id = "b1";
		$add_form_id = "af1";
		$par_menu_id = "menu_par_id";
		$par_menu_nm = "menu_par_nm";
		$menu_tit_id = "menu_tit_id";
		$menu_tit_nm = "menu_tit_nm";
		$menu_link_nm = "menu_link_nm";
		$menu_link_id = "menu_link_id";
		if(isset($myaction) && $myaction == "add") { 
		$add_form_id = "af1";
		$par_menu_id = "menu_par_id";
		$par_menu_nm = "menu_par_nm";
		$menu_tit_id = "menu_tit_id";
		$menu_tit_nm = "menu_tit_nm";
		$menu_link_nm = "menu_link_nm";
		$menu_link_id = "menu_link_id";
		if(!empty($_POST)) 
		{	//print_r($_POST);
			if(empty($_POST[$menu_tit_nm])){ $err = "Please Enter Menu Title";
			echo "<div class='alert alert-error' id='e1'>";
			echo $err;
			echo "</div>";
			} else {
				$k_w_v = array('m_parent_name'=>$_POST[$par_menu_nm],'m_menu_title'=>$_POST[$menu_tit_nm],'m_menu_link'=>$_POST[$menu_link_nm]);
				$q_res = $q->dml(TAB_ADMIN_MENU,$k_w_v,'add');
				//echo $q_res;exit;
				header("location:menu.php");
				
			}
			
		}
	} else if(isset($myaction) && $myaction  == "edit") {  print_r($_POST);
		$add_form_id = "u_f1";
		$par_menu_id = "u_menu_par_id";
		$par_menu_nm = "u_menu_par_nm";
		$menu_tit_id = "u_menu_tit_id";
		$menu_tit_nm = "u_menu_tit_nm";
		$menu_link_nm = "u_menu_link_nm";
		$menu_link_id = "u_menu_link_id";
	$rp = $q->get(TAB_ADMIN_MENU,"m_id='".$id."'");
		if(!empty($_POST)) 
		{	
			if(empty($_POST[$menu_tit_nm])){ $err = "Please Enter Menu Title"; 
			echo "<div class='alert alert-error' id='u1'>";
			echo $err;
			echo "</div>";
			}  else {
				$k_w_v = array('m_parent_name'=>$_POST[$par_menu_nm],'m_menu_title'=>$_POST[$menu_tit_nm],'m_menu_link'=>$_POST[$menu_link_nm]);
				$q_res = $q->dml(TAB_ADMIN_MENU,$k_w_v,$required="",'upd',"m_id='".$_POST['id']."'");
				//echo $q_res;
				header("location:menu.php");
				
			} 
			
		}
	} else if(isset($myaction) && $myaction == "delete") {
		$q_res = $q->dml(TAB_ADMIN_MENU,$k_w_v = "",'delete',"m_id='".$_POST['id']."'");
		//echo $q_res;exit;
		header("location:menu.php");
	
	}
		$res = $q->get(TAB_ADMIN_MENU);
		
		

?>
<script type="text/javascript">
$(document).ready(function() { 

$("#<?php echo $add_form_id; ?>").css("display","none");
$("#<?php echo $btn_id; ?>").click(function() {
	$("#<?php echo $dis_tab_id; ?>").hide("slow",function() {
		$("#<?php echo $add_form_id; ?>").show("slow");
	});
 });
 if($("#e1").css("display") == "block"){
	$("#<?php echo $dis_tab_id; ?>").css("display","none");
	$("#<?php echo $add_form_id; ?>").show("slow");
 }
 
 var action = "<?php if(isset($myaction)) echo $myaction; ?>";
 
	if(action == "edit"){
		if($("#u1").css("display") == "block"){
		$("#<?php echo $dis_tab_id; ?>").css("display","none");
		$("#<?php echo $add_form_id; ?>").show("slow");
		 }
	}
	})	;
	function MyAction(myaction, ids){
		if(myaction == "edit"){
			document.menu_frm.action = "menu.php";
			document.menu_frm.myaction.value = myaction;
			document.menu_frm.id.value = ids;
			document.menu_frm.submit();
		}else if(myaction == "delete"){
			document.menu_frm.action = "menu.php";
			document.menu_frm.myaction.value = myaction;
			document.menu_frm.id.value = ids;
			document.menu_frm.submit();
		}
		
	}
</script>	
			<div class="row-fluid">
					<div class="span12" id="<?php echo $dis_tab_id; ?>">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Dynamic table
								</h3>
                                <a style="float:right !important;margin:5px 10px 5px 5px;" class="btn" id="<?php echo $btn_id; ?>" href="#">Add New</a>
							</div>
                            
							<div class="box-content nopadding">
							<form name="menu_frm" method="post" action="" class="printable">
                            	<table class="table table-nomargin dataTable table-bordered">
									<thead>
										<tr>
											<th width="2%">Sr No.</th>
											<th>Menu Title</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
								<?php $i=0; foreach($res as $row) { $i++; ?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row['m_menu_title']; ?></td>
										<td><a onClick="MyAction('edit','<?php echo $row['m_id']; ?>')" href="javascript:void(0);" >
                                                        	<i class="icon-edit"></i>
											</a>
											<a onClick="MyAction('delete','<?php echo $row['m_id']; ?>')" href="javascript:void(0);" >
                                                        	<i class="icon-trash"></i>
                                            </a>
										</td>
									</tr>
									<?php } ?>
									</tbody>
								</table>
                               	<input type="hidden" name="id" id="id" />
                            	<input type="hidden" name="myaction" id="myaction" />
		                        </form>
							</div>
						</div>
					</div>
					<!-- menu form start -->
					<div class="row-fluid">
					<div class="span12" id="<?php echo $add_form_id; ?>">
						<div class="box box-bordered box-color">
							<div class="box-title">
								<h3><i class="icon-th-list"></i>  Details</h3>
							</div>
							<div class="box-content nopadding">
								<form id="sitemenu_frm" class="form-horizontal form-bordered" method="POST" action="">
                                    <div class="control-group">
                                        <label class="control-label">Parent Menu</label>
                                        <div class="controls">
                                            <select name="<?php echo $par_menu_nm; ?>" id="<?php echo $par_menu_id; ?>">
                                                <option value="0">Select Parent</option>
												<?php //print_cat_dropdown(); ?>	
                                            </select>
											
                                        </div>
                                    </div>
                                
									<div class="control-group">
										<label class="control-label">Menu Title</label>
                                        <div class="controls">
                                            <input type="text" placeholder="Menu Title" value="<?php if(isset($myaction) && $myaction == "edit") {echo $rp[0]['m_menu_title'];} ?>" maxlength="25" name="<?php echo $menu_tit_nm; ?>" id="<?php echo $menu_tit_id; ?>">
                                            
											
                                        </div>
									</div>
									
									<div class="control-group">
                                        <label class="control-label">Menu Link</label>
                                        <div class="controls">
                                            <select name="<?php echo $menu_link_nm; ?>" id="<?php echo $menu_link_id; ?>">
                                                <option value="cms_page.php">Menu Link</option>
                                                <option value="index.php">Home</option>
                                                </select>
										</div>
                                    </div>
									
									<div style="padding:10px 10px 10px 180px;" class="">
										<input type="submit" id="menu_save" value="<?php if(isset($myaction) && $myaction == "edit") {echo "Save";} else { echo "Add"; } ?>" class="btn btn-primary">
                                        <input type="button" onclick="window.location='menu_display.php'" value="Cancel" class="btn">
                                        <input type="hidden" value="<?php if(isset($myaction) && $myaction == "edit") {echo "edit";} else { echo "add"; } ?>" id="myaction" name="myaction">
                                        <input type="hidden" value="<?php if(isset($myaction) && $myaction == "edit") {echo $id;} else { echo ""; } ?>" id="id" name="id">
                                        
									</div>
									
								</form>
							</div>
						</div>
						</div>
						</div>
				</div>
