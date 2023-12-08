<?php 
    include '../modun/modelClass.php';
?>
<?php
$cartegory = new cartegory;
if(!isset($_GET['banner_id']) || ( $_GET['banner_id'])==NULL ){
    echo "<script>window.location = 'banner.php'</script>";
}
else{
    $banner_id = $_GET['banner_id'];

}
    $update_banner_hien = $cartegory ->update_banner_hien($banner_id);

?>