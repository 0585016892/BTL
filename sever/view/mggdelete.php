<?php 
    include '../modun/modelClass.php';
?>
<?php
$cartegory = new cartegory;
if(!isset($_GET['discount_id']) || ( $_GET['discount_id'])==NULL ){
    echo "<script>window.location = 'magiamgia.php'</script>";
}
else{
    $discount_id = $_GET['discount_id'];

}
    $delete_discount = $cartegory -> delete_discount($discount_id);

?>