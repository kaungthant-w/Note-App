<?php
require("config.php");
  $pdoStmt = $pdo->prepare("SELECT * FROM note ORDER BY id DESC");
  $pdoStmt->execute();
  $result = $pdoStmt->fetchAll();
  // print_r($result);
  // echo $result[0][2];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body class="app">
    <div class="container mt-0 mt-sm-5 p-3 bg-light h-full rounded">
        <div class="p-3 mt-2 h2">
            <a href="#" data-bs-toggle="modal" data-bs-target="#add"><i class="fa-solid fa-plus"></i></a>
            Notes
        </div>
        <div class="my-5 ">
            <div class="row ml-3">
              <?php
                  if($result) {
                    foreach($result as $value) {
                      ?>
                      <div class="col-12 col-md-6 col-lg-4 mb-3 noteBody">
                          <div class="card bg-secondary" style="height:200px;">
                              <div class="card-body text-white">
                                  <h4 class="card-title"> <?php echo $value["title"]; ?>
                                  </h4>
                                  <span class="card-subtitle d-block mb-2 text-sm"><?php echo date("M Y d", strtotime($value["created_at"])); ?></span>

                                  <p class="card-text"><?php echo $value["description"]; ?></p>
                                  
                                  <div class="mt-3">
                                    <a href="delete.php?id=<?php echo $value["id"]; ?>" class="card-link text-danger h4"><span><i class="fa-solid fa-trash"></i></span>
                                    </a>

                                    <a href="edit.php?id=<?php echo $value["id"]; ?>" class="card-link text-warning float-end h4" ><span><i class="fa-solid fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#edit1"></i></span>
                                    </a>
                                  </div>

                              </div>
                            </div>
                          </div>
                      <?php
                  }
                }
                ?>
            </div>
        </div>
    </div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/note.js"></script>
</body>
</html>


<!-- add  -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action="add.php" method="POST">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description"  cols="30" rows="10"></textarea>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <input type="submit" class="btn btn-primary" value="Add">
            </div>
       </form>
      </div>
      
    </div>
  </div>
</div>
