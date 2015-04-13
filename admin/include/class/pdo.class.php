<?php
include_once("config.php");

	class dbo {
	
		private $host = HOST;
		private $user = USER;
		private $pwd = "";
		private $db = DATABASE;
		
		private $DBH = null;
	
	//-- CONSTRUCTIOR -----------------------------------------------
	
		function __construct() {
			try
			{
				$this->DBH = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user, $this->pwd);
				$this->DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				$this->DBH->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			}
			catch(PDOException $e) { die($e->getMessage()); }
		}
	
	//-- DML --------------------------------------------------------
	
		function dml($q, $params = array())
		{
			try
			{
				$STH = $this->DBH->prepare($q);
				$STH->execute($params);
				return $this->DBH->lastInsertId();
			}
			catch(PDOException $e) { die($e->getMessage()); }
		}
	
	//-- DML_update--------------------------------------------------------
	
		function dml_update($q, $params = array())
		{
			try
			{
				$STH = $this->DBH->prepare($q);
				$STH->execute($params);
				return $STH->rowCount();
			}
			catch(PDOException $e) { die($e->getMessage()); }
		}
	
	//-- GET --------------------------------------------------------
	
		function get($q, $params = array())
		{
			try
			{
				$STH = $this->DBH->prepare($q);
				$STH->execute($params);
				
				return $STH->fetchAll();
			}
			catch(PDOException $e) { die($e->getMessage()); }
		}
		
	//-- FOUND ------------------------------------------------------
		
		function found($q, $params = array())
		{
			try
			{
				$STH = $this->DBH->prepare($q);
				$STH->execute($params);
				return ($STH->rowCount() > 0) ? true : false;
			}
			catch(PDOException $e) { die($e->getMessage()); }
		}
		
	//-- GET SCALAR -------------------------------------------------
	
		function get_scalar($q, $params = array())
		{
			try
			{
				$STH = $this->DBH->prepare($q);
				$STH->execute($params);
				return $STH->fetchColumn();
			}
			catch(PDOException $e) { die($e->getMessage()); }
		}
		
	}
	
	$db = new dbo();

?>