function MyAction(action,id){
	if(action=="delete"){
		if (confirm("Are you sure You want to delete this item ?")){
		$.post("../admin/include/commonAjax.php",{"action":"delete","table":"android_api","id":id});
		return true;
		}
	}	
	
}