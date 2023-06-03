<?php
include_once('./db/connection.php');
$dbh = new curd2("localhost", "root", "", "mahmudur_rahman");

if ($dbh) {
    $sql = 'SELECT * FROM `student` where id = :id';
    $stmt = $dbh->conn->prepare($sql);
    $stmt->bindParam(':id', $_REQUEST['id']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <form action="update.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" class="form-control" id="Name" name="name" value="<?php echo $result['name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $result['email']; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">update</button>
                             <a href="read.php" class="btn btn-danger">Cancle</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
}
?>