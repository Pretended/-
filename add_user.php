<?php
/**
 * Created by PhpStorm.
 * User: teaven
 * Date: 2018/6/12
 * Time: 4:53 PM
 */
include ("header.php");
include ("db.php");

$flag = 0;

if(isset($_POST['submit'])){
    $result = mysqli_query($con,"insert into users(username)values('$_POST[username]')");
    if($result){
        $flag = 1;
    }
}
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
            <a class="btn btn-success" href="add.php">添加电影</a>
            <a class="btn btn-info pull-right" href="index.php">返回</a>
        </h2>
    </div>

    <?php
    if($flag){  ?>
    <div class="alert alert-success">用户添加成功</div>
    <?php   }   ?>

    <div class="panel-body">
        <form action="add_user.php" method="post">
            <div class="form-group">
                <label for="username">用户名</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="提交" class="btn btn-primary" required>
            </div>
        </form>
    </div>
</div>
