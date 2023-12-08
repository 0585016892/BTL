<?php 
    include '../modun/modelClass.php';
?>
<?php
$cartegory = new cartegory;
if(!isset($_GET['danhmuc_id']) || ( $_GET['danhmuc_id'])==NULL ){
    echo "<script>window.location = 'banner.php'</script>";
}
else{
    $danhmuc_id = $_GET['danhmuc_id'];

}
    $delete_acc = $cartegory -> delete_danhmuc($danhmuc_id);

?>