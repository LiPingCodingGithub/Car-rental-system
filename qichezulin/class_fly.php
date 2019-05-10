<?php 

/**
在app端对数据库的访问，包括查询、插入、输出等
*/
class fly
{
	function __construct()
	{
		// $con = $this->db_connect();
		// $this->yanzheng($con);
		// echo 'hello';
	}
	//验证passward是否为真，有无篡改
	public function yanzheng($con){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = 'select*from user where user_name='.$username.' and user_password='.$password;
		$value = $con->query($sql);
		while ($row = mysqli_fetch_assoc($value)){
			$result = $row;
		}
		if(empty($result))exit();
	}
	//验证所需查询的范围,需要吗？
	public function fanwei(){

	}
	//数据库连接
	public function db_connect(){
		$con = mysqli_connect("localhost","root","root",'qichezulin');
		$con->query('set names utf8');
		return $con;
	}
	public function db_select($con,$sql){//把查询到的内容放$data数组
		$values = $con->query($sql);
		$data = array();
			while ($row = mysqli_fetch_assoc($values)) {
				$data[] = $row;
			}
			return $data;
	}
	public function create_randomstring($length ){
		//备用的字符!@#$%^&()-_[]{}~`+=,.;: 
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; 
		$randomstring =''; 
		for ( $i = 0; $i < $length; $i++ ) { 
		// 这里提供两种字符获取方式 
		// 第一种是使用 substr 截取$chars中的任意一位字符； 
		// 第二种是取字符数组 $chars 的任意元素 
		// $password .= substr($chars, mt_rand(0, strlen($chars) – 1), 1); 
		$randomstring .= $chars[ mt_rand(0, strlen($chars) - 1) ]; 
		} 
		return $randomstring; 
	} 
	public function switch_person_type_id($id){
		switch($id){
			case 1: return 'mingzi';
			case 2: return 'mingzi2';
		}
	}
}

?>
