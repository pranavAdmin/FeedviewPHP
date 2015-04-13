<?php require_once("pdo.class.php");

	class paging
	{
		private $items_per_page = 2;
		
		private $img_next = "images/next.png";
		private $img_previous = "images/previous.png";
		
		private $class_page = "paging_link";
		private $class_page_disabled = "paging_link_disabled";
		
		private $qs_paging_var = "page";
		
		//-- DO NOT EDIT BELOW ------------------------------------------------
		
		private $query;
		private $current_page;
		private $total_items;
		private $last_page;
			
		function __construct($query)
		{
			$db = new dbo();
		
			//Save Query
			$this->query = $query;
		
			//Current Page
			$this->current_page = isset( $_GET[$this->qs_paging_var] ) ? $_GET[$this->qs_paging_var] : 1;
			
			//Total Items
			$total_query = $this->convert_to_count_query($query);
			$this->total_items = $db->get_scalar($total_query);
			
			//Last Page
			$this->last_page = ceil( $this->total_items / $this->items_per_page );
		}
		
		function get_result()
		{
			$db = new dbo();
			$query = $this->query . $this->get_limits();
			$result = $db->get($query);
			
			return $result;
		}
		
		function previous()
		{
			if($this->has_previous())
				return '<a href="'.$this->previous_link().'"><img src="'.$this->img_previous.'"></a>';
			else
				return '<img src="'.$this->img_previous.'" style="opacity: 0.5">';
		}
		
		function next()
		{
			if($this->has_next())
				return '<a href="'.$this->next_link().'"><img src="'.$this->img_next.'"></a>';
			else
				return '<img src="'.$this->img_next.'" style="opacity: 0.5">';
		}
		
		function page_links()
		{
			for($i=1; $i<=$this->last_page; $i++)
			{
				if($i == $this->current_page)
					echo "<span class='".$this->class_page_disabled."'>".$i."</span> ";
				else
					echo "<a href='".$this->page_link($i)."'><span class='".$this->class_page."'>".$i."</span></a> ";
			}
		}
		
		function get_last_page()
		{
			return $this->last_page;
		}
		
		function get_current_page()
		{
			return $this->current_page;
		}
		
		function has_next()
		{
			return $this->current_page < $this->last_page;
		}
		
		function has_previous()
		{
			return $this->current_page > 1;
		}
		
		function next_link()
		{
			if($this->has_next())
				return $this->get_url()."&page=".($this->current_page + 1);
			else
				return "#";
		}
		
		function previous_link()
		{
			if($this->has_previous())
				return $this->get_url()."&page=".($this->current_page - 1);
			else
				return "#";
		}
		
		function page_link($page)
		{
			if($page >= 1 && $page <= $this->last_page)
				return $this->get_url()."&page=".$page;
			else
				return "#";
		}
		
		function get_limits()
		{
			$this_page_start = ($this->current_page - 1) * $this->items_per_page;
			return " LIMIT ".$this_page_start.",".$this->items_per_page;
		}
		
		function convert_to_count_query($query)
		{
			$query = trim($query);
			
			$select_pos = 6;
			$from_pos = strpos($query, "from")-6;
			
			$query = substr_replace($query, " count(*) ", $select_pos, $from_pos);
			
			return $query;
		}
		
		function get_url()
		{
			$st = basename($_SERVER["SCRIPT_NAME"]);
			if($_SERVER["QUERY_STRING"] != "")
			{
				$pos = strpos($_SERVER["QUERY_STRING"], $this->qs_paging_var);
				
				if($pos)
				{
					$st .= "?".substr($_SERVER["QUERY_STRING"], 0, $pos-1);
				}
				else
				{
					$st .= "?".$_SERVER["QUERY_STRING"];
				}
				
			}
			return $st;
		}
	}

?>