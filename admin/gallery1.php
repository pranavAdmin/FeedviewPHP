<?php
include_once("include/header.php");
error_reporting(0);
$gallary_data = new query();
$resource = $gallary_data->get(TAB_GALLERY);
$showDivFlag=true;

if(isset($_REQUEST['myaction'])) 
{
	$myaction=$_REQUEST['myaction'];
	$id=$_REQUEST['id'];
	
}
?>
<style>
.error {
    color: red;
    display: none;
    font-size: 11px;
    font-weight: bold;
}
</style>
<script>
$(document).ready(function() 
{ 
	<?php $showDivFlagform=false; ?>
	$("#ad_new").click(function() 
	{
		$("#Listing_gallery").hide(function() 
		{
			$("#add_edit_frm").show();			
		});
	});
	/*$("#add_gallary_save").click(function(){
	$(".error").hide();
		df = 1;
	if($.trim($("#gallary_img").val())=="" && $.trim($("#file").val())==""){
				df = 0;
			$("#gallery_img_erblank").css("display","block");
			$("#gallary_img").focus();
			return false;
		}
		if(df==1)
		{
			document.gallery_manager.action="gallery.php";
			document.gallery_manager.submit();
		}
	});*/
	
	
});

</script>
<?php
//=============================================================================== gallery insert/update code[start]	

if(isset($_GET['action']) || $_GET['action']=='add' || $_GET['action']=='edit')
{
	$showDivFlag=false;
	$showDivFlagform=true;
	if(isset($_FILES["image"]["name"]) && $_FILES["image"]["name"]!="")
	{
			$uploadOk=1;
			if ($uploadOk==0) 
			{
      			echo "Sorry, your file was not uploaded.";
	 		} 
			else 
			{
		 		$_SESSION['fname'] = time()."_".$_POST['file'];
	   
				if (move_uploaded_file($_FILES["image"]["tmp_name"],"include/img/gallery/".$_SESSION['fname'])) 
				{
					echo "The file ". $_SESSION['fname']. " has been uploaded.";
				}
			} 
		}
		
		$required	=	array('title'=>$_POST['title'],'display order'=>$_POST['display_order']);	
		$val=$gallary_data->dml($tbl="",$g_query="",$required,$action="");
		if(isset($_POST['gallery_submit']))
		{
			
			?><script>
					/*$("#add_gallary_save").click(function(){*/
						//alert("sds");return false
						$(document).ready(function() 
{ 
	$(".error").hide();
		df = 1;
	if($.trim($("#gallary_img").val())=="" && $.trim($("#file").val())==""){
		//alert("test");return false;
				df = 0;
			$("#gallery_img_erblank").css("display","block");
			$("#gallary_img").focus();
			return false;
		}
		if(df==1)
		{
			document.gallery_manager.action="gallery.php";
			document.gallery_manager.submit();
		}
		});
	/*});*/
                </script><?php
			
			if(isset($val) && count($val) > 0)
			{
				?><?php 
				?>
				<div class='alert alert-error' id='e1'>
				<?php
							
				   foreach ($val as $error)
					{
						echo "<div>".$error."</div>";	
					}
				?>	
				</div>
				<?php
			}
			else
			{
				echo "success";
			}
		}
		
		if(count($val)==0)
		{	
			if(isset($_GET['action']) && $_GET['action']=="add")
			{
				
				$g_query	=	array('title'=>$_POST['title'],'category_id'=>$_POST['category_id'],'image'=>$_SESSION['fname'],'display_order'=>$_POST['display_order']);
				
				$g_res		=	$gallary_data->dml(TAB_GALLERY,$g_query,$req="",'add');
				unset($_SESSION['fname']);
				header("location:gallery.php");
			}
			else
			{
			
				if($_SESSION['fname']=="")
				{
					$g_update	=	array('title'=>$_POST['title'],'category_id'=>$_POST['category_id'],'image'=>$_POST['file'],'display_order'=>$_POST['display_order']);
				}
				else
				{
					$g_update	=	array('title'=>$_POST['title'],'category_id'=>$_POST['category_id'],'image'=>$_SESSION['fname'],'display_order'=>$_POST['display_order']);
				}
					$update = $gallary_data->dml(TAB_GALLERY,$g_update,$required="","upd","gallery_id='".$_GET['id']."'");
					
				unset($_SESSION['fname']);
				header("location:gallery.php");
			}
		}	
}

//=============================================================================== gallery insert/update code[end]
		
//=============================================================================== gallery edit code[start]	
if(isset($_GET['action']) && $_GET['action'] == "edit" && isset($_GET['id']) && $_GET['id']!="")
	{
		$edit=$gallary_data->get(TAB_GALLERY,"gallery_id='".$_GET['id']."'");
		$title=$edit[0]['title'];
		$image=$edit[0]['image'];
		$dsp_order=$edit[0]['display_order'];
		
	}
	else
	{
		$title="";
		$dsp_order="";
		$image="";
	}
//=============================================================================== menu gallery edit code[end]

//=============================================================================== gallery delete code[start]	
	if(isset($myaction) && $myaction == "delete") {
			
		$gallery_delete = $gallary_data->dml(TAB_GALLERY,$g_query = "",$req="",'delete',"gallery_id='".$_POST['id']."'");
		header("location:gallery.php");
	}
	//=============================================================================== gallery delete code[end]
?>
<script>
function MyAction(myaction, ids)
{
    	if(myaction == "delete")
		{
			if(!confirm("Are you sure you want to delete ?"))
			{
				return false;
			}
			else
			{
				document.gallary_manager_nm.action = "gallery.php";
				document.gallary_manager_nm.myaction.value = myaction;
				document.gallary_manager_nm.id.value = ids;
				document.gallary_manager_nm.submit();
			}
		}			
}
</script>
<div class="row-fluid" >
      <div id="Listing_gallery" class="span12" 
	<?php if(isset($showDivFlag)){if($showDivFlag===false){?>style="display:none;"<?php }} ?>>
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3><i class="icon-th-list"></i>Gallery</h3>
                <div>
                <!--<input type="button" id="ad_new" value="Add New" style="float:right;margin-right:5px;" class="btn">-->
                <a style="float:right ;margin-right:5px;" class="btn" href="gallery.php?action=add" id="ad_new">Add New</a>
                
                </div>
            </div>
            
            <div class="box-content nopadding">
            <form name="menu_frm" method="post" action="" class="printable">
                <table class="table table-nomargin dataTable table-bordered" id="t_aj">
                    <thead>
                        <tr>
                            <th width="2%">Sr No.</th>
                            <th>Gallery Title</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <?php $i=1; foreach($resource as $row) {?>
                    <tbody>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['category_id']; ?></td>
                            <td><!--<img src="gal_img/<?php// echo $gal_row['g_img']; ?>" style="width:200px; height:50px" />-->
                                <img width="300px" height="300px" src="include/img/gallery/<?php echo $row['image']; ?>" />  
                            </td>
                            <td>
<!-- onclick button edit code -->
<a href="gallery.php?action=edit&id=<?php echo $row['gallery_id']; ?>" id="edit">
    <i class="icon-edit"></i>
</a>
<a onClick="MyAction('delete','<?php echo $row['gallery_id']; ?>')" href="javascript:void(0);">
    <i class="icon-trash"></i>
</a>
                            </td>
                        </tr>
                        <?php  ?>
                        <?php } ?>   
                    </tbody>
                </table>
             </form>
            </div>
        </div>
    </div>
    
    <div class="row-fluid">
        <div class="span12" id="add_edit_frm" <?php if(isset($showDivFlagform)){if($showDivFlagform===false){?>style="display:none;"<?php }} ?> >
            <div class="box box-bordered box-color">
                <div class="box-title">
                    <h3><i class="icon-th-list"></i>Gallery Manager </h3>
                </div>
                <div class="box-content nopadding">
                    <form id="gallery_manager" name="gallery_manager" class="form-horizontal form-bordered" method="post" action=""  enctype="multipart/form-data">
                        <div class="control-group">
                            <label class="control-label">Title</label>
                            <div class="controls">
                                <input type="text" name="title" value="<?php if(isset($_POST['title'])){ echo $_POST['title'];} if($title!="") {echo $title;}?>" id="title_id" placeholder="Text Input"  maxlength="25"  >
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="category_id">Category</label>
                            <div class="controls">
                                <select class="input-large" id="category_id" name="category_id">
                                    <option value="">Select Category</option>
                                    <option value="Select Category 1">Select Category 1</option>
                                    <option value="Select Category 2">Select Category 2</option>
                                </select>
                            </div>
                        </div>
                        <?php if($image!="") { ?>
                        <div class="control-group">
                           
                             <label class="control-label">Image</label>
                            <div class="controls"> 
							<img src="include/img/gallery/<?php echo $image; ?>" id="gallery_viewimg_id" class='preview' width="215px" height="360px" />               
                            </div>
                        </div>
                        <?php }?>      
                        <div class="control-group">
                        	<label class="control-label">Image</label>
                            <div class="controls">
                            	
                                <input type="file" name="image" value="<?php echo $edit[0]['image']; ?>" id="gallary_img" style="float:left;" onclick="this.focus()" onblur="test(this)" />
                                <div id='gallery_img_erblank' class="error alert alert-error">Please select image.</div>
                                <input type="hidden" name="file" id="file" value="<?php echo $image; if(isset($_FILES["image"]["name"])){echo $_FILES["image"]["name"];} ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Display Order</label>
                            <div class="controls">
                                <input type="text" name="display_order" placeholder="0" style="width:60px;" value="<?php if(isset($_POST['display_order'])){echo $_POST['display_order'];} if($dsp_order!="") {echo $dsp_order;} ?>" maxlength="4"  id="disp_ord">                          
                            </div>
                        </div>
                        <div style="padding:10px 10px 10px 180px;" class="">  
                           <input type="submit" id="add_gallary_save" value="<?php if(isset($_GET['action']) && $_GET['action'] == "edit") {echo "Save";} else { echo "Add"; } ?>"  class="btn btn-primary" name="gallery_submit"/>                    
                            <input type="button" value="Cancel" onclick="window.location='gallery.php'"  class="btn">          
                             <input type="hidden" name="myaction" id="myaction" value="<?php echo $myaction;?>">  
                              <input type="hidden" value="<?php echo $id; ?>" id="id" name="id">  
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</div>
<script>
function test()
{
	var artcontent = document.getElementById("gallary_img_btn_id").value;
	var clean=artcontent.split('\\').pop(); 
	var file=document.getElementById("file").value = clean;
}
</script>