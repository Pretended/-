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
            <th>用户名</th>
            <th>添加喜好电影</th>
            <th>喜好</th>
            <th>推荐</th>
            <?php $result = mysqli_query($con,"select * from users");
            while ($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td>
                        <form action="add_movies.php">
                            <input type="submit" name="add_movies" class="btn btn-primary" value="添加">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        </form>
                    </td>
                    <td>
                        <form action="show_movies.php">
                            <input type="submit" name="show_movies" class="btn btn-primary" value="显示喜好">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        </form>
                    </td>
                    <td>
                        <form action="user_recommendation.php">
                            <input type="submit" name="show_movies" class="btn btn-primary" value="显示推荐">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        </form>
                    </td>
                </tr>
            <?php   }   ?>
        </table>
    </div>
</div>
