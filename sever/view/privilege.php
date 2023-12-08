<?php
$pageTitleAmin = "Trang thành viên";
    include './header.php';
    include './slide.php';
    include '../modun/modelClass.php';
    include '../modun/config/config2.php'
?>
<style>
    .privilege-group{
        padding:0 45px ;
    }
</style>
<?php
if (!empty($_SESSION['user'])) {
    ?>
    <div class="content-left">
        <div class="main">
            <div class="content-left-cartelogy_add">
                <div class="main-content">
                    <h2 style="padding: 15px;">Phân quyền thành viên</h2>
                    <?php 
                        if(!empty($_GET['action']) && $_GET['action'] == 'save') {
                            $data = $_POST;
                            $insertString = "";
                            $deleteOldPrivileges = mysqli_query($conn, "DELETE FROM `tbl_user_privilege` WHERE `admin_id` = ".$data['admin_id']);
                            foreach ($data['privileges'] as $insertPrivilege) {
                                $insertString .= !empty($insertString) ? "," : "";
                                $insertString .= "(NULL,  '" . $insertPrivilege . "', '" . time() . "', '" . time() . "',' " . $data['admin_id'] . "')";
                            }
                            $insertPrivilege = mysqli_query($conn, "INSERT INTO `tbl_user_privilege` (`user_privilege_id`, `privilege_id`, `created_time`, `last_update`, `admin_id`) VALUES " . $insertString);
                            if(!$insertPrivilege){
                                $error = "Phân quyền không thành công. Xin thử lại";
                            }?>
                    <?php if(!empty($error)){ ?>

                    <?php } else { ?>
                          <div class="btn">Phân quyền thành công</div>
                    <?php } ?>
                    <?php } else {?>
                    <div id="content-box">
                        <?php
                            $privileges = mysqli_query($conn,'SELECT * FROM tbl_privilege ' );
                            $privileges = mysqli_fetch_all($privileges , MYSQLI_ASSOC);

                            $privilegesGroup = mysqli_query($conn,'SELECT * FROM `tbl_privileges_group` ORDER BY tbl_privileges_group.privileges_group_position ASC' );
                            $privilegesGroup = mysqli_fetch_all($privilegesGroup,MYSQLI_ASSOC);

                            $currentPrivileges = mysqli_query($conn, "SELECT * FROM `tbl_user_privilege` WHERE `admin_id` = ".$_GET['admin_id']);
                            $currentPrivileges = mysqli_fetch_all($currentPrivileges, MYSQLI_ASSOC);
                            $currentPrivilegeList = array();
                            if(!empty($currentPrivileges)){
                                foreach($currentPrivileges as $currentPrivilege){
                                    $currentPrivilegeList[] = $currentPrivilege['privilege_id'];
                                }
                            }
                            ?>
                                <form id="editing-form" method="POST" action="?action=save" enctype="multipart/form-data">
                                    <input type="submit" class="btn" title="Lưu thành viên" value="Lưu thành viên" style="position: absolute;right:35px;" />
                                    <input type="hidden" name="admin_id" value="<?=$_GET['admin_id']?>" />
                                    <div class="clear-both"></div>
                                    <?php foreach($privilegesGroup as $group) {?>
                                        <div class="privilege-group">
                                            <h3 class="group-name"><?= $group['privileges_group_name'] ?></h3>
                                            <ul style="display: flex;gap: 7%;padding:15px 45px;">
                                                <?php  foreach($privileges as $privilege) { ?>
                                                <?php if($privilege['privileges_group_id'] == $group['privileges_group_id']){ ?>
                                                <li>
                                                        <input type="checkbox"
                                                        <?php if(in_array($privilege['privilege_id'], $currentPrivilegeList)){ ?> 
                                                                checked
                                                                <?php } ?>
                                                                name="privileges[]"
                                                                value="<?php echo $privilege['privilege_id']?>" id="privilege_<?php echo $privilege['privilege_id']?>" 
                                                                 />
                                                        <label for="privilege__<?php echo $privilege['privilege_id']?>"><?php echo $privilege['privilege_name']?></label>
                                                </li>
                                                <?php }?>
                                                <?php }?>
                                                <div class="clear-both"></div>
                                            </ul>
                                        </div>
                                        <?php } ?>
                                </form>
                                <?php }?>
                            </div>
                        </div>
                    </div>
    </div>
</div>
    <?php
}
?>