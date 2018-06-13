<?php
/**
 * Created by PhpStorm.
 * User: teaven
 * Date: 2018/6/12
 * Time: 5:28 PM
 */
include ("header.php");
include ("db.php");
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
            <a class="btn btn-success" href="add_user.php">添加用户</a>
            <a class="btn btn-info pull-right" href="index.php">返回</a>
        </h2>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <th>电影</th>
            <th>评级</th>
            <?php $result = mysqli_query($con,"select * from user_movies where user_id = '$_GET[id]'");
            while ($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td><?php echo $row['movie_name']; ?></td>
                    <td><?php echo $row['movie_rating']; ?></td>
                </tr>
            <?php   }   ?>
        </table>
    </div>
</div>
