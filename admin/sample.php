echo $db->get_scalar("select count(*) from famous where 
	name = ?", array('Lyubomyr Guzar'));
	echo "<hr />";
	
	/*$id = $db->dml("insert into famous (name, bio, file) values(?,?,?)",array("hi","how r u","1.jpg"));
	echo "inserted id:".$id."<hr/>";*/
	
	echo $db->dml_update("update famous set name = ? where id = ?", array('abidbhai', '4'));
	echo "<hr/>";
	
	$query = "select * from famous";
	
	$page = new paging($query);
	$page_res = $page->get_result();
	
	if(mysql_num_rows($page_res) == "")
	{
		echo "not found";
	}
	while($page_row = mysql_fetch_array($page_res)){
		echo "Name:".$page_row["name"];
		echo "<br/><hr/><br/>";
		echo "bio:".$page_row["bio"];
		echo "<br/><hr/><br/>";
	}
	$page->page_links();
	
	echo site_root;
