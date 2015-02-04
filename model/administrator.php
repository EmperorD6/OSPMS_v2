 <!--@author Darryl-->
  <!--@copyright 2014-->
<?php 


function get_alladmin()
{
	include "config/conn.php";

	$join="Select registration.* from admin inner join registration on admin.admin_id=registration.reg_id";
	  
				
	$join_result=mysqli_query($cxn,$join);

	
	return $join_result;
	

}

function get_allteacher()
{
	include "config/conn.php";

	$join="Select  registration.*, teacher.t_position from teacher inner join registration on teacher.teacherID=registration.reg_id";
	  
				
	$join_result=mysqli_query($cxn,$join);

	
	return $join_result;
	

}

function get_allstudent()
{
	include "config/conn.php";

	$join="SELECT registration1.*,registration2.reg_lname,registration2.reg_fname,registration2.reg_mname 
	from student as studentprofile inner join registration as registration1 on studentprofile.student_lrn=registration1.reg_id 
	left join parent as parentprofile on studentprofile.parentID=parentprofile.parentID 
	left join registration as registration2 on parentprofile.parentID=registration2.reg_id";
	  
				
	$join_result=mysqli_query($cxn,$join);

	
	return $join_result;
	


}

function get_allsubject()
{
	include "config/conn.php";

	$sql="Select * from subject_";

	$sql=mysqli_query($cxn,$sql);

	return $sql;
}

function get_allsection()
{
	include "config/conn.php";

	$sql="Select * from section_list";

	$sql=mysqli_query($cxn,$sql);

	return $sql;
}

function get_allgradelevel()
{
	include "config/conn.php";

	$sql="Select * from grade_level";

	$sql=mysqli_query($cxn,$sql);

	return $sql;


}

function get_allannouncement_lecture()
{

	include "config/conn.php";
	
	$sql="SELECT announcement_lecture.date_created, announcement_lecture.messageorfile_caption,announcement_lecture.file_path, announcement_lecture.file_name, 
	section_list.sectionNo, section_list.section_name, registration.reg_lname, registration.reg_fname, registration.reg_mname 
	from section_list inner join section on section_list.sectionID=section.sectionID
	inner join registration on section.teacherID=registration.reg_id 
	inner join post_announcement_lecture on section.class_rec_no=post_announcement_lecture.class_rec_no 
	inner join announcement_lecture on post_announcement_lecture.date_created=announcement_lecture.date_created order by date_created desc";
	
	$sql= mysqli_query($cxn,$sql);
	
	return $sql;

}

function get_allaccounts()
{
	include "config/conn.php";

	$sql="SELECT create_account.*, registration.reg_fname, registration.reg_lname FROM create_account 
	inner join registration on create_account.account_id=registration.reg_id";

	$sql=mysqli_query($cxn,$sql);

	return $sql;
}


?>