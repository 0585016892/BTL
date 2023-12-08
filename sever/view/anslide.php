<?php 
    include '../modun/modelClass.php';
?>
<?php
$cartegory = new cartegory;
if(!isset($_GET['slide_id']) || ( $_GET['slide_id'])==NULL ){
    echo "<script>window.location = 'slide.php'</script>";
}
else{
    $slide_id = $_GET['slide_id'];

}
    $update_slider_an = $cartegory ->update_slider_an($slide_id);

?>