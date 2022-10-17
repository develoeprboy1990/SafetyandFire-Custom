<?php
include_once("../classes/config.php");
if(isset($_POST['submit'])){

    //$target_dir = "uploads/";
	$target_dir ="../".IMAGES_FOLDER."/";

	
    $allow_types = array('jpg','png','jpeg','gif');
    $Web->query("Select * from web_images where ParentID='".$_POST['RecordID']."'");
		if($Web->num_rows()>0)
		{
			$count = $Web->num_rows()+1;
		}else{
			$count = 1;	
		}
		
    $images_arr = array();
    foreach($_FILES['images']['name'] as $key=>$val){
		
				
				
        $image_name = $_FILES['images']['name'][$key];
        $tmp_name   = $_FILES['images']['tmp_name'][$key];
        $size       = $_FILES['images']['size'][$key];
        $type       = $_FILES['images']['type'][$key];
        $error      = $_FILES['images']['error'][$key];
        
        
        $file_name = basename($_FILES['images']['name'][$key]);
        $targetFilePath = $target_dir . $file_name;
		$FileName = $file_name;
		
		$Extension = $Web->GetExtension($file_name);
		
		$UplaodFileName = date("Ymdhis")."_".$Web->GeneratePassword(8).".".$Extension;

		$UploadFilePath = $target_dir."/".$UplaodFileName;

	
	
		
		
		
        
        $file_type = pathinfo($UploadFilePath,PATHINFO_EXTENSION);
        if(in_array($file_type, $allow_types)){    
            
            if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$UploadFilePath)){
                $images_arr[] = $UploadFilePath;
				
			
			$Web->query("insert into web_images set FileName='".$UplaodFileName."', Type='2', Sequence='".$count."', ParentID='".$_POST['RecordID']."'");
        
				
            }
        }
    $count ++;}
   
 
	
	
    if(!empty($images_arr)){ ?>
    <script>window.location.replace("index.php?page=products&PageType=images&RecordID=<?php echo $_POST['RecordID']; ?>");</script>
        <ul>
        <?php foreach($images_arr as $image_src){ ?>
            <li><img src="<?php echo $image_src; ?>" alt=""></li>
        <?php } ?>
        </ul>
<?php }
}


	
?>