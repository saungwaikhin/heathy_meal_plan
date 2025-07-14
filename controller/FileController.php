<?php
class FileController{
	public function renderFileUploadDownload(){
		return new UpdateUserProfileEditView();
	}
	public function renderFileUpload(){
		$dest_path=store_uploaded_file(ELEMENT, "./images/");
   		$_SESSION["upload"]=$dest_path;
   		$userdao=new UserDao();
   		$userdao->updateUserPhoto();
		return new UpdateUserProfileEditView();
	}
	public function renderFileDownload(){
$file=$_SESSION['upload'];
$file_type=$_SESSION["filetype"];
$filename="./images/".$_SESSION["filename"].".".$_SESSION["filetype"];
if (file_exists($filename)) {
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment;
filename="'.basename($filename).'"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($filename));
readfile($filename);
exit;
}
}
}
