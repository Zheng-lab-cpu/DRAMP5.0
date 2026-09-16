<?php

	class public_mysql_tool {

		private $conn;

		private $host="localhost";

		private $user="root";

		private $password="ZhengH@123";

		private $db="temp";

		
		// private $host="localhost";

		// private $user="root";

		// private $password="root";

		// private $db="temp";

		public function __construct()
		{
				// 创建连接
			$mysqli = new mysqli($this->host,$this->user,$this->password, $this->db);

			// 检查连接是否成功
			if ($mysqli->connect_error) {
				die('Connect Error (' . $mysqli->connect_error . ')');
			}
			$charset = 'utf8mb4';
			// 设置字符集为 utf8mb4，这对于非英语语言非常重要
			if (!$mysqli->set_charset($charset)) {
				die('Error loading character set utf8mb4: ' . $mysqli->error);
			}
			$this->conn=$mysqli;
  
		}

		function public_mysql_tool1(){
		 
			// $this->conn=mysql_connect($this->host,$this->user,$this->password);
 
			// if(!$this->conn){

			// 	die("sorry".mysql_error());

			// }

			// mysql_select_db($this->db,$this->conn);

			// mysql_query("set names utf8");

		}

		

		//insert the data

		public function execute_submit($sql){

			$res = mysql_query($sql,$this->conn) or die(mysql_error());

			return $res;

		}	





		// go to select

		public function execute_dql($sql){

			// $res=mysql_query($sql,$this->conn) or  die(mysql_error());

			// if (mysql_num_rows($res)<1) {

			// 	return 0;

			// }else{

			// 	while ($row=mysql_fetch_assoc($res)){

			// 		$this->result[]=$row;

			// 	}

			// 	return $this->result;

			// }

			$res=mysqli_query($this->conn,$sql);

			if (mysqli_num_rows($res)<1) {

				return 0;

			}else{

				while ($row=mysqli_fetch_assoc($res)){

					$this->result[]=$row;

				}

				return $this->result;

			}


		}

		

		public function execute_dql_gold($sql){

			$my_res=mysql_query($sql,$this->conn) or  die(mysql_error());

			

			if (mysql_num_rows($my_res)<1) {

				return 0;

			}else{

				while ($row=mysql_fetch_row($my_res)){

					foreach ($row as $key=>$val){

						$this->result[]=$val;

					}

				}

				return $this->result;

			}

		}

		

		

		public function exectue_dql_fenye($sql1,$sql2,$FenyePage){
			//重写代码
			// $res=mysql_query($sql1,$this->conn) or  die(mysql_error());
			$res=mysqli_query($this->conn,$sql1);



			$arr=array();

			

			// while ($row=mysql_fetch_assoc($res)) {

			// 	$arr[]=$row;

			// }

			while ($row=mysqli_fetch_assoc($res)) {

				$arr[]=$row;

			}
			// mysql_free_result($res);
			mysqli_free_result($res);

			// $res2 = mysql_query($sql2,$this->conn) or  die(mysql_error());
			$res2 = mysqli_query($this->conn,$sql2);

			// if ($row=mysql_fetch_row($res2)) {

			// 	$FenyePage->pageCount=ceil($row[0]/$FenyePage->pageSize);

			// 	$FenyePage->rowCount=$row[0];

			// 	//print $FenyePage->pageCount;

			// }

			if ($row=mysqli_fetch_row($res2)) {

				$FenyePage->pageCount=ceil($row[0]/$FenyePage->pageSize);

				$FenyePage->rowCount=$row[0];

				//print $FenyePage->pageCount;

			}

			// mysql_free_result($res2);
			mysqli_free_result($res2);
			$FenyePage->res_array=$arr;

			

		}

		

		//update,delete,insert

		public function execute_dml($sql){

			$b=mysql_query($sql,$this->conn) or  die(mysql_error());

			if (!$b){

				

				return 0;//false

			}else{

				if (mysql_affected_rows($this->conn)>0){

					return 1;//success

				}else{

					return 2;//nothing

				}

			}

		

		}

	

}



?>

