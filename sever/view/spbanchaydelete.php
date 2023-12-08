<?php 
    include '../modun/modelClass.php';
?>
<?php
$cartegory = new cartegory;
if(!isset($_GET['spbanchay_id']) || ( $_GET['spbanchay_id'])==NULL ){
    echo "<script>window.location = 'banner.php'</script>";
}
else{
    $spbanchay_id = $_GET['spbanchay_id'];

}
    $delete_acc = $cartegory -> delete_sanphambanchay($spbanchay_id);

?>