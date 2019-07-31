<?php 
session_start();
class config extends koneksi
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function login(){
		if(isset($_POST['lgn'])){
			parent::begintransaction();
			parent::query("SELECT * FROM user WHERE username = :user AND password = :pwd ");
			parent::bind(":user",$_POST['user']);
			parent::bind(":pwd",$_POST['pwd']);
			parent::execute();
			parent::endtransaction();
			$row = parent::rowCount();
			if($row > 0){
		        echo "<meta http-equiv='refresh' content='1; URL=home.php' />";
				// header("location:index.php");
				$_SESSION['user_session'] = $_POST['user'];
			}else{
				echo "<div class='alert alert-success'>Login Gagal</div>";
			}
		}
	}

	public function daftar(){
		if(isset($_POST['daf'])){
		parent::begintransaction();
		parent::query("INSERT INTO user (username, password, nama, log) VALUES (:user, :pwd, :nama, 2)");
		parent::bind(":user",$_POST['user']);
		parent::bind(":pwd",$_POST['pwd']);
		parent::bind(":nama",$_POST['nama']);
		parent::execute();
		parent::endtransaction();
		header("location:index.php");

		}
	}

	
	public function isLoggedIn(){
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}

	public function getUser(){
		if(!$this->isLoggedIn()){
			return false;
		}

		try {
			parent::query("SELECT * FROM user WHERE username = :user");
			parent::bind(":user", $_SESSION['user_session']);
			parent::execute();
			return parent::assoc();
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
	
    public function logout()
    {
        $_SESSION['user_session']=FALSE;
        session_destroy();
        unset($_SESSION['user_session']);
	}

	public function all_absen(){
		parent::begintransaction();
		parent::query("SELECT *, a.id AS kode FROM user AS a INNER JOIN user_meeting AS b ON a.id = b.user_id INNER JOIN meeting AS c ON c.id = b.meeting_id");
		parent::execute();
		parent::endtransaction();
		return $do = parent::fetchAll();
	}

	public function add_data_absen(){
		if(isset($_POST['add'])){
		$start = $_POST['start_date']." ".$_POST['start_time'];
		$end = $_POST['end_date']." ".$_POST['end_time'];
		parent::begintransaction();
		parent::query("INSERT INTO user_meeting (start, end, user_id, meeting_id) VALUES (:start, :end, :nama, :meeting)");
		parent::bind(":start",$start);
		parent::bind(":end",$end);
		parent::bind(":nama",$_POST['nama']);
		parent::bind(":meeting",$_POST['meeting']);
		parent::execute();
		parent::endtransaction();
		echo "<meta http-equiv='refresh' content='1; URL=absen.php' />";
		}
	}

	public function all_student(){
		parent::begintransaction();
		parent::query("SELECT * FROM user");
		// parent::query("SELECT *, a.id AS kode FROM user AS a INNER JOIN user_group AS b ON a.id = b.user_id INNER JOIN groups AS c ON b.group_id = c.id");
		parent::execute();
		parent::endtransaction();
		return $do = parent::fetchAll();
	}

	public function all_edit_student($id){
		parent::begintransaction();
		parent::query("SELECT *, a.id AS kode FROM user AS a INNER JOIN user_group AS b ON a.id = b.user_id INNER JOIN groups AS c ON b.group_id = c.id WHERE a.id = ".$id);
		parent::execute();
		parent::endtransaction();
		return $do = parent::fetch();
	}
	
	public function all_edit_student_group($id){
		parent::begintransaction();
		parent::query("SELECT * FROM user_group WHERE user_id = ".$id);
		parent::execute();
		parent::endtransaction();
		return $do = parent::fetch();
	}

	public function add_data_student(){
		if(isset($_POST['add'])){
		parent::begintransaction();
		parent::query("INSERT INTO user (name, username, password, type) VALUES (:nama, :username, :password, :type)");
		parent::bind(":nama",$_POST['nama']);
		parent::bind(":username",$_POST['username']);
		parent::bind(":password",$_POST['password']);
		parent::bind(":type",$_POST['type']);
		parent::execute();
		$last = parent::lastInsertId();
		parent::endtransaction();

		parent::begintransaction();
		parent::query("INSERT INTO user_group (group_id, user_id) VALUES (:group,".$last.")");
		parent::bind(":group",$_POST['group']);
		parent::execute();
		parent::endtransaction();
		echo "<meta http-equiv='refresh' content='1; URL=home.php' />";
		}
	}
	
	public function edit_data_student($id){
		if(isset($_POST['edit'])){
		parent::begintransaction();
		parent::query("UPDATE user SET name=:nama, username=:username, password=:password, type=:type WHERE id = ".$id);
		parent::bind(":nama",$_POST['nama']);
		parent::bind(":username",$_POST['username']);
		parent::bind(":password",$_POST['password']);
		parent::bind(":type",$_POST['type']);
		parent::execute();
		parent::endtransaction();

		
		parent::begintransaction();
		parent::query("UPDATE user_group SET group_id=:group WHERE user_id = ".$id);
		parent::bind(":group",$_POST['group']);
		parent::execute();
		parent::endtransaction();
		echo "<meta http-equiv='refresh' content='1; URL=home.php' />";

		}
	}

	public function del_student(){
		if(isset($_POST['del'])){
		parent::begintransaction();
		parent::query("DELETE FROM user WHERE id = :id");
		parent::bind(":id",$_POST['id']);
		parent::execute();
		parent::endtransaction();
		
		// parent::begintransaction();
		// parent::query("DELETE FROM user_group WHERE user_id = :id");
		// parent::bind(":id",$_POST['id']);
		// parent::execute();
		// parent::endtransaction();
		echo "<meta http-equiv='refresh' content='1;' />";
		}
	}

	public function all_meeting(){
		parent::begintransaction();
		parent::query("SELECT *, a.id AS kode FROM meeting AS a INNER JOIN room AS b ON a.room_id = b.id INNER JOIN subject AS c ON a.subject_id = c.id");
		parent::execute();
		parent::endtransaction();
		return $do = parent::fetchAll();
	}

	public function all_detail_meeting($id){
		parent::begintransaction();
		parent::query("SELECT *, a.id AS kode FROM meeting AS a INNER JOIN room AS b ON a.room_id = b.id INNER JOIN subject AS c ON a.subject_id = c.id WHERE a.id = ".$id);
		parent::execute();
		parent::endtransaction();
		return $do = parent::fetch();
	}	
	
	public function all_detail_user_meeting($id){
		parent::begintransaction();
		parent::query("SELECT * FROM meeting AS a INNER JOIN user_meeting AS b ON a.id = b.meeting_id LEFT JOIN user AS c ON b.user_id = c.id WHERE a.id = ".$id);
		parent::execute();
		parent::endtransaction();
		return $ds = parent::fetchAll();
	}

	public function all_edit_meeting($id){
		parent::begintransaction();
		parent::query("SELECT *, a.id AS kode FROM meeting AS a INNER JOIN room AS b ON a.room_id = b.id INNER JOIN subject AS c ON a.subject_id = c.id WHERE a.id = ".$id);
		parent::execute();
		parent::endtransaction();
		return $do = parent::fetch();
	}
	
	public function meeting_user_group($id){
		parent::begintransaction();
		parent::query("SELECT * FROM user_meeting AS a INNER JOIN user AS b ON a.user_id = b.id WHERE meeting_id =  ".$id);
		parent::execute();
		parent::endtransaction();
		return $do = parent::fetch();
	}	

	public function all_room(){
		parent::begintransaction();
		parent::query("SELECT * FROM room");
		parent::execute();
		parent::endtransaction();
		return $do = parent::fetchAll();
	}	
	
	public function all_user_group(){
		parent::begintransaction();
		parent::query("SELECT * FROM user_group AS a INNER JOIN group_room AS b ON a.group_id = b.group_id LEFT JOIN user_subject AS c ON a.user_id = c.user_id INNER JOIN groups AS d ON b.group_id = d.id INNER JOIN subject AS e ON b.group_id = e.class");
		parent::execute();
		parent::endtransaction();
		return $do = parent::fetchAll();
	}

	public function all_edit_room($id){
		parent::begintransaction();
		parent::query("SELECT * FROM room WHERE id = ".$id);
		parent::execute();
		parent::endtransaction();
		return $do = parent::fetch();
	}

	public function all_group(){
		parent::begintransaction();
		parent::query("SELECT * FROM groups");
		parent::execute();
		parent::endtransaction();
		return $do = parent::fetchAll();
	}	

	public function all_edit_group($id){
		parent::begintransaction();
		parent::query("SELECT * FROM groups WHERE id = ".$id);
		parent::execute();
		parent::endtransaction();
		return $do = parent::fetch();
	}

	public function all_subject(){
		parent::begintransaction();
		parent::query("SELECT * FROM subject");
		parent::execute();
		parent::endtransaction();
		return $do = parent::fetchAll();
	}

	public function all_edit_subject($id){
		parent::begintransaction();
		parent::query("SELECT * FROM subject WHERE id = ".$id);
		parent::execute();
		parent::endtransaction();
		return $do = parent::fetch();
	}

	public function all_data_subject(){
		parent::begintransaction();
		parent::query("SELECT *, a.id AS kode FROM subject AS a INNER JOIN groups AS b ON a.class = b.id");
		parent::execute();
		parent::endtransaction();
		return $do = parent::fetchAll();
	}

	public function add_data_subject(){
		if(isset($_POST['add'])){
		parent::begintransaction();
		parent::query("INSERT INTO subject (subject_name, class, year_semester) VALUES (:name, :group, :ses)");
		parent::bind(":name",$_POST['name']);
		parent::bind(":group",$_POST['group']);
		parent::bind(":ses",$_POST['ses']);
		parent::execute();
		parent::endtransaction();
		echo "<meta http-equiv='refresh' content='1; URL=data_subject.php' />";
		}
	}	
	
	public function edit_data_subject($id){
		if(isset($_POST['edit'])){
		parent::begintransaction();
		parent::query("UPDATE subject SET subject_name=:name, class=:group, year_semester=:ses WHERE id = ".$id);
		parent::bind(":name",$_POST['name']);
		parent::bind(":group",$_POST['group']);
		parent::bind(":ses",$_POST['ses']);
		parent::execute();
		parent::endtransaction();
		echo "<meta http-equiv='refresh' content='1; URL=data_suject.php' />";

		}
	}

	public function del_subject(){
		if(isset($_POST['del'])){
		parent::begintransaction();
		parent::query("DELETE FROM subject WHERE id = :id");
		parent::bind(":id",$_POST['id']);
		parent::execute();
		parent::endtransaction();
		echo "<meta http-equiv='refresh' content='1;' />";
		}
	}

	public function add_data_meeting(){
		if(isset($_POST['add'])){
			
		$start = $_POST['start_date']." ".$_POST['start_time'];
		$end = $_POST['end_date']." ".$_POST['end_time'];
		parent::begintransaction();
		parent::query("INSERT INTO meeting (start, end, room_id, subject_id) VALUES (:start, :end, :room, :sub)");
		parent::bind(":start",$start);
		parent::bind(":end",$end);
		parent::bind(":room",$_POST['room']);
		parent::bind(":sub",$_POST['subject']);
		parent::execute();
		$last = parent::lastInsertId();
		parent::endtransaction();
		$output = '';
		$num = 1;
		
		for($i=0;$i<count($_POST["user"]);$i++)
		{
			
			parent::begintransaction();
			parent::query("INSERT INTO user_meeting (start, end, user_id, meeting_id) VALUES (:start, :end, :user, :meeting)");
			parent::bind(":start",$start);
			parent::bind(":end",$end);
			parent::bind(":user",$_POST["user"][$i]);
			parent::bind(":meeting",$last);
			parent::execute();
			parent::endtransaction();
			// echo "txtSiteName $i = ".$_POST["txtSiteName"][$i]."<br>";
		}
		// echo $output;
		echo "<meta http-equiv='refresh' content='1; URL=meeting.php' />";
		}
	}
	
	public function edit_data_meeting($id){
		if(isset($_POST['edit'])){
		$start = $_POST['start_date']." ".$_POST['start_time'];
		$end = $_POST['end_date']." ".$_POST['end_time'];
		parent::begintransaction();
		parent::query("UPDATE meeting SET start=:start, end=:end, room_id=:room, subject_id=:sub WHERE id = ".$id);
		parent::bind(":start",$_POST['start']);
		parent::bind(":end",$_POST['end']);
		parent::bind(":room",$_POST['room']);
		parent::bind(":sub",$_POST['subject']);
		parent::execute();
		parent::endtransaction();
		for($i=0;$i<count($_POST["user"]);$i++)
		{
			parent::begintransaction();
			parent::query("UPDATE user_meeting SET start=:start, end=:end, user_id=:user, meeting_id=:meeting WHERE id = ".$id);
			parent::bind(":start",$_POST['start']);
			parent::bind(":end",$_POST['end']);
			parent::bind(":room",$_POST["user"][$i]);
			parent::bind(":sub",$_POST['subject']);
			parent::execute();
			parent::endtransaction();
		}
		echo "<meta http-equiv='refresh' content='1; URL=meeting.php' />";

		}
	}

	public function del_meeting(){
		if(isset($_POST['del'])){
		parent::begintransaction();
		parent::query("DELETE FROM meeting WHERE id = :id");
		parent::bind(":id",$_POST['id']);
		parent::execute();
		parent::endtransaction();
		echo "<meta http-equiv='refresh' content='1;' />";
		}
	}
	
	public function add_data_room(){
		if(isset($_POST['add'])){
		parent::begintransaction();
		parent::query("INSERT INTO room (room_name) VALUES (:name)");
		parent::bind(":name",$_POST['name']);
		parent::execute();
		parent::endtransaction();
		echo "<meta http-equiv='refresh' content='1; URL=room.php' />";
		}
	}	
	
	public function edit_data_room($id){
		if(isset($_POST['edit'])){
		parent::begintransaction();
		parent::query("UPDATE room SET room_name=:name WHERE id = ".$id);
		parent::bind(":name",$_POST['name']);
		parent::execute();
		parent::endtransaction();
		echo "<meta http-equiv='refresh' content='1; URL=room.php' />";

		}
	}

	public function del_room(){
		if(isset($_POST['del'])){
		parent::begintransaction();
		parent::query("DELETE FROM room WHERE id = :id");
		parent::bind(":id",$_POST['id']);
		parent::execute();
		parent::endtransaction();
		echo "<meta http-equiv='refresh' content='1;' />";
		}
	}
	
	public function add_data_group(){
		if(isset($_POST['add'])){
		parent::begintransaction();
		parent::query("INSERT INTO groups (group_name) VALUES (:name)");
		parent::bind(":name",$_POST['name']);
		parent::execute();
		parent::endtransaction();
		echo "<meta http-equiv='refresh' content='1; URL=group.php' />";
		}
	}	
	
	public function edit_data_group($id){
		if(isset($_POST['edit'])){
		parent::begintransaction();
		parent::query("UPDATE groups SET group_name=:name WHERE id = ".$id);
		parent::bind(":name",$_POST['name']);
		parent::execute();
		parent::endtransaction();
		echo "<meta http-equiv='refresh' content='1; URL=group.php' />";

		}
	}

	public function del_group(){
		if(isset($_POST['del'])){
		parent::begintransaction();
		parent::query("DELETE FROM groups WHERE id = :id");
		parent::bind(":id",$_POST['id']);
		parent::execute();
		parent::endtransaction();
		echo "<meta http-equiv='refresh' content='1;' />";
		}
	}
}

?>