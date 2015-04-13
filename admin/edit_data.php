<?php
print_r($_REQUEST);exit;
include_once("include/header.php");

$gallary_data = new query();

$myaction=$_REQUEST['myaction'];
$id=$_REQUEST['id'];

if(!empty($_POST))
{
	$err=array();
	if($_POST['title_nm']==""){
		$err[]="Please enter title";
	}
	else if($_POST['cat_nm']==""){
		$err[]="Please select catagory";
	}
	else if($_FILES['gallary_btn_nm']['name']==""){
		$err[]="Please select image";
	}
	else if($_POST['disp_ord']==""){
		$err[]="Please enter display order";
	}
	else
	{
		$fnm 		= 	time()."_".$_FILES["gallary_btn_nm"]["name"];
						move_uploaded_file($_FILES["gallary_btn_nm"]["tmp_name"],"include/img/gallery/".$fnm);
		$g_query	=	array('title'=>$_POST['title_nm'],'category_id'=>$_POST['cat_nm'],'image'=>$fnm,'display_order'=>$_POST['disp_ord']);
		$g_res		=	$gallary_data->dml(TAB_GALLERY,$g_query,'add');

		header("location:gallary_manager.php");
	}
}
$resource = $gallary_data->get(TAB_GALLERY);
?>

	<div class="row-fluid"  >
        <div class="span12" id="display_block" >
            <div class="box box-bordered box-color">
                <div class="box-title">
                    <h3><i class="icon-th-list"></i> Add / Update</h3>
                </div>
                <div class="box-content nopadding">
                    <form id="gallary_manager_id" name="gallary_manager_nm" class="form-horizontal form-bordered" method="POST" action=""  enctype="multipart/form-data">
                        <div class="control-group">
                            <label class="control-label">Title</label>
                            <div class="controls">
                                <input type="text" name="title_nm" value="<?php echo  ?>" id="title_id" placeholder="Text Input"  maxlength="25"  >
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="cat_nm">Category</label>
                            <div class="controls">
                                <select class="input-large" id="cat_id" name="cat_nm">
                                    <option value="Select Category">Select Category</option>
                                    <option value="Select Category 1">Select Category 1</option>
                                    <option value="Select Category 2">Select Category 2</option>
                                </select>
                                
                            </div>
                        </div>
                        <div class="control-group">
                        	<label class="control-label">Image</label>
                            <div class="controls">
                                <input type="file" name="gallary_btn_nm" value="" id="gallary_img_btn_id" style="float:left;" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Display Order</label>
                            <div class="controls">
                                <input type="text" name="disp_ord" placeholder="0" style="width:60px;" value="<?php echo $ord; ?>" maxlength="4"  id="disp_ord">                          
                            </div>
                        </div>
                        <div style="padding:10px 10px 10px 180px;" class="">
                            
                            <input type="submit" value="<?php echo ($myaction == "edit")? "Save":"Add" ?>" class="btn btn-primary" id="add_gallary_save"   >
                            <input type="button" value="Cancel" onclick="window.location='gallary_manager.php'"  class="btn">           
                            
                            <input type="hidden" value="<?php echo ($myaction == "edit")? 'edit':'add'; ?>" id="myaction" name="myaction">
                            <input type="hidden" value="<?php echo ($myaction == "edit")? 'edit':'add'; ?>" id="myaction" name="myaction">
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>