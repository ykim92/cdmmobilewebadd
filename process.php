<div data-role="page">
	<header data-role="header">
		<h1>Status Dialog</h1>
	</header>
	<div data-role="content">
<?php
mobilewebAddAction($this,$_FILES);

function mobilewebAddAction($parent,$_FILES) {
    // variable for checking whether the form met the requirement of having file and title
    $allrequired = TRUE;
    
    // gets the webaddform input array
    $webaddPostArray = array("CISODB"=>"/".$parent->collection,"CISOHEAD"=>"","CISOTHUMB"=>"generate","CISOFILE"=>"file",
    "dmaccess"=>"","redirect"=>"/index.php","CISOMODE"=>"1");
	
    foreach($_POST AS $k=>$v){
      if($k == "title" && empty($v)){
        $allrequired = FALSE;
      }
      if($k != "CISOBROWSE" && $k != "webaddurl"){
        $webaddPostArray[$k] = $v;
      }
    } 
    if(empty($_FILES['CISOBROWSE']['name'])){
      $allrequired = FALSE;
    }
    
    if($allrequired) {
      $webaddPostArray["CISOEXT"] = strtolower(substr($_FILES['CISOBROWSE']['name'], strrpos($_FILES['CISOBROWSE']['name'], ".")+1, strlen($_FILES['CISOBROWSE']['name'])));
      $webaddPostArray["CISOBROWSE"] = "@".$_FILES['CISOBROWSE']['tmp_name'];
      
      if($_FILES['CISOBROWSE']['error'] != UPLOAD_ERR_OK) {
        $returnMsg = "uploaderror";
      } else {        
		$returnMsgOutput = $parent->cdmapi->api_post_web_upload($webaddPostArray, $parent->configs["webAddFormUsername"],$parent->configs["webAddFormPassword"],$parent->collection);
        $rm = json_decode($returnMsgOutput);
		$returnMsg = $rm->status;
      }
    } else {
      $returnMsg = "required";
    }    
    $collectionParm = "";
    if(!empty($parent->collection)){
      $collectionParm = "/collection/".$parent->collection;
    }
    $serverProtocol = $parent->currentProtocol;
    if(empty($returnMsg)){
      $returnMsg = "failure";
    }
	$redirUrl = $serverProtocol.$_SERVER["HTTP_HOST"].$parent->configs["homeUrl"].$parent->cdmCustomPage.$collectionParm."?page=0";
	
	// status message
	if(!empty($returnMsg)){
		?>
		<h1>
		<?php
		switch($returnMsg){
			case "success":
				echo "The file has been uploaded for approval!";
				break;
			case "failure":
				echo "There was a problem saving the item.  Please try again.";
				break;
			case "uploaderror":
				echo "There was a problem uploading the file. Please try again.";
				break;
			case "required":
				echo "Both the File and the Title fields are required. Please try again.";
				break;
		}
		?>
		</h1>
	<?php
	}
	?>
	<button data-theme="b" id="return" onclick="window.location.href='<?php echo $redirUrl;?>'" >Return</button>
	</div>
</div>
<?php	
}
?>
