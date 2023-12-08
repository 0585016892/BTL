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
    $delete_acc = $cartegory -> delete_bannerr($banner_id);

?>