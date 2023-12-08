<?php 
    include '../modun/modelClass.php';
?>
<?php
$cartegory = new cartegory;
if(!isset($_GET['admin_id']) || ( $_GET['admin_id'])==NULL ){
    echo "<script>window.location = 'thanhvien.php'</script>";
}
else{
    $admin_id = $_GET['admin_id'];

}
    $delete_acc = $cartegory ->  delete_thanhvien($admin_id);

?>