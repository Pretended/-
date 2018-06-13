<?php
/**
 * Created by PhpStorm.
 * User: teaven
 * Date: 2018/6/12
 * Time: 6:26 PM
 */
include ("header.php");
include ('recommend.php');
include ("db.php");
$movies = mysqli_query($con,"select * from user_movies");
$matrix = array();
while ($movie_row = mysqli_fetch_array($movies)){
    $users = mysqli_query($con,"select username from users where id=$movie_row[user_id]");
    $username = mysqli_fetch_array($users);

    $matrix[$username['username']][$movie_row['movie_name']]=$movie_row['movie_rating'];
}
//echo "<pre>";
//print_r($matrix);
//echo "</pre>";
$users=mysqli_query($con,"select username from users where id=$_GET[id]");
$username_row=mysqli_fetch_array($users);
var_dump(getRecommendation($matrix,$username_row['username']));
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
            <th>推荐度</th>
            <?php
            $recommendation = array();
            $recommendation = getRecommendation($matrix,$username_row['username']);
            foreach ($recommendation as $movie=>$rating) {

            ?>
                <tr>
                    <td><?php echo $movie; ?></td>
                    <td><?php echo $rating; ?></td>
                </tr>
            <?php   }   ?>
        </table>
    </div>
</div>

