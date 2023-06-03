<?php
include_once('./db/connection.php');
$dbh = new curd2("localhost", "root", "", "mahmudur_rahman");

if ($dbh) {
    $sql = 'SELECT * FROM `student`';
    $stmt = $dbh->conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <a href="index.html" class="btn btn-primary">Add New</a>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Create At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                 foreach($result as $item){
            ?>
            <tr>
                <td><?php echo $item['id'] ?></td>
                <td><?php echo $item['name'] ?></td>
                <td><?php echo $item['email'] ?></td>
                <td><?php 
                        
                        $create = date('d/M/Y h:i A', strtotime($item['create_at']));
                echo $create; 
                    ?>
                </td>
                <td><a href="edit.php?id=<?php echo $item['id'];?>">Edit</a> <a href="delete.php?id=<?php echo $item['id'];?>">delete</a></td>
            </tr>
            <?php
                }
            ?>
        </tbody>


    </table>

<?php
}
?>