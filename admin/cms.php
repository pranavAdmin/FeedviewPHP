<?php
include_once 'include/header.php';
$table=new query();
$total=$table->select(TAB_CMS_MANAGER);
$currentPage="Content Management System";
//echo "<pre>";print_r($_REQUEST);die;
?>
	<script src="<?php echo SITE_PLUGIN_JS;?>datatable/jquery.dataTables.min.js"></script>
	<script src="<?php echo SITE_PLUGIN_JS;?>datatable/TableTools.min.js"></script>
	<script src="<?php echo SITE_PLUGIN_JS;?>datatable/ColReorderWithResize.js"></script>
	<script src="<?php echo SITE_PLUGIN_JS;?>datatable/ColVis.min.js"></script>
	<script src="<?php echo SITE_PLUGIN_JS;?>datatable/jquery.dataTables.columnFilter.js"></script>
	<script src="<?php echo SITE_PLUGIN_JS;?>datatable/jquery.dataTables.grouping.js"></script>
	<script src="<?php echo SITE_PLUGIN_JS;?>validation/jquery.validate.min.js"></script>
<?php 
	if(isset($_POST['submit']) && $_POST['submit']!=""){
		$crud=new query();
		$Four=$crud->tml(array("tdId","description"),$_POST);
		if(key($Four)=="error"){
			echo "<script type='text/javascript'>$(document).ready(function(){ $('#EditCms').css('display','block');});</script>";
			echo "<div class='alert alert-error' id='Errors'>";
			foreach($Four['error'] as $err){
				echo $err."<br>";
			}
			echo "</div>";
		}
	}
?>   
<script type="text/javascript">
var pages_name="";
$(document).ready(function(e) {
 	$("#EditCms").css("display","none");
	$("#EditButton").click(function() {
		$("#ListingCms").hide("slow",function() {
			$("#HideMeAction").val(0);
			$("#tdId").val('');
			$.post("commonAjax.php",{"ckeditor":1}).done(function(ckeditor){$("#tdDescription").html(ckeditor);});
			$("#tdPageSelect").val('');
			$("#tdMetaTitle").val('');
			$("#tdMetaKeywords").val('');			
			$("#tdMetaDescription").val('');
			$("#tdTracking").val('');
			$("#EditCms").show("slow");
		});
	 });
	 if($("#e1").css("display") == "block"){
		$("#EditCms").css("display","none");
		$("#ListingCms").show("slow");
	 }
	 $("#BackButton").click(function() {
			$("#EditCms").hide("slow",function() {
				$("#ListingCms").show("slow");
			});
	 });
	$("[id=editRowCms]").click(function(e) {
		$.post("include/commonAjax.php",{"edit_id":$(this).attr("data-attr")}).done(function(keep){
			//$("#tdDescription").html(keep);
			var arr=keep.split("##");
			var StringObj=$.parseJSON(arr[1]);
			$("#Errors").html("");
			$("#Errors").css("display","none");
			$("#tdId").val(StringObj.page_name);
			$("#tdDescription").html(arr[0]);
			$("#tdPageSelect").val(StringObj.page_name);
			$("#tdMetaTitle").val(StringObj.meta_title);
			$("#tdMetaKeywords").val(StringObj.meta_keyword);			
			$("#tdMetaDescription").val(StringObj.meta_description);
			$("#tdTracking").val(StringObj.tracking_code);
		});
		$("#ListingCms").hide("slow",function() {
			$("#EditCms").show("slow");
		});
	});	 
});</script>
	<div class="row-fluid" id="ListingCms">
		<div class="span12">
			<div class="box box-color box-bordered">
                <div class="box-title">
                    <h3><?php echo $currentPage;?></h3>
                    <div><input type="button" id="EditButton" value="Add New" style="float:right;margin-right:5px;" class="btn"></div>
                </div>
				<div class="box-content nopadding">
					<table class="table table-hover table-nomargin dataTable table-bordered">
					<thead>
						<tr>
							<th width="10px;">No</th>
							<th>Page Name</th>
							<th style="width:2%;">Status</th>
							<th style="width:2%;">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $count=1; 
						foreach ($total as $totalRow){?>
                            <tr>
	                           <td><?php echo $count; ?></td>
                            	   <td><?php echo $totalRow['page_name']; ?></td>
                                   <td><?php if($totalRow['c_status']=='1'){ ?>
                                   	<a onClick="MyAction('inactive','<?php echo $row['id']; ?>')" href="javascript:void(0);" >
					    <i class="icon-ok"></i>
                                        </a>
                                       <?php }else{ ?>
                                       <a onClick="MyAction('active','<?php echo $row['id']; ?>')" href="javascript:void(0);" >
                                         <i class="icon-ban-circle"></i>
                                       </a>
                                       <?php } ?>
                                   </td>
                                   <td>
                                    <a data-attr="<?php echo $totalRow['id']; ?>" id="editRowCms"  href="javascript:void(0);" >
                                    	<i class="icon-edit"></i>
                                    </a>
                                    <a onClick="MyAction('delete','<?php echo $row['id']; ?>')" href="javascript:void(0);" >
                                 		<i class="icon-trash"></i>
                                 	</a>
	                          	 </td>
                           </tr> 
                           <?php $count++; }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="row-fluid" id="EditCms">
<div class="span12">
<div class="box box-color box-bordered">
<div class="box-title">
    <h3><?php echo $currentPage;?></h3>
    <div><input type="button" id="BackButton" value="Back" style="float:right;margin-right:5px;" class="btn"></div>
</div>
<div class="box-content nopadding" id="cmsEditContent">
    <form action="" method="post" enctype="multipart/form-data" name="frmEdit" id="frmEdit" class='form-validate'>
	<table class="table table-hover" id="tableEdit">
	      <tr><td>Name:</td><td id="tdId"><input type="text" name="tdId" id="tdId" value="" data-rule-required="true"/></td></tr>
	      <tr><td>Select Page:</td><td><select name="PageTo" id="PageTo"></select></td></tr>
	      <tr><td>description:</td><td id="tdDescription"><?php $table->insertCk("description"); ?></td></tr>
	      <tr><td>Meta Title:</td><td><input type="text" name="tdMetaTitle" id="tdMetaTitle"/></td></tr>
	      <tr><td>Meta Keywords:</td><td><input type="text" name="tdMetaKeywords" id="tdMetaKeywords"></td></tr>
	      <tr><td>Meta Descriptions:</td><td><input type="text" name="tdMetaDescription" id="tdMetaDescription"/></td></tr>                            <tr><td>Tracking Code:</td><td><input type="text" name="tdTracking" id="tdTracking"/></td></tr>
	      <tr>
		<td>&nbsp;</td>
		<td>
		    <input type="hidden" id="HideMeAction" value="1" name="HideMeAction"/>
		    <input type="submit" id="BackButton" name="submit" value="Submit" class='btn btn-primary'/>
		    <input type="button" id="CancelButton" value="Cancel" onclick="javascript:window.location='cms.php';"class="btn"/>
		</td>
	      </tr>
	</table>
    </form>
</div>
</div>
</div>
</div>

<?php include_once 'include/footer.php';?>