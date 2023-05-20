<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main>
  <div class="add-task">
    <!-- MESSAGES -->


    <!-- ADD TASK FORM -->
    <div class="form">
      <form class="form-tsk" action="save_task.php" method="POST">
        <div class="title-task">
          <h2>Add book</h2>
        </div>
        <div class="input">
          <input class="input-task" type="text" name="title" placeholder="Book title">
        </div>
        <div class="text">
          <textarea class="text-area" name="description" rows="2" placeholder="Short Review"></textarea>
        </div>
        <div class="button">
          <input class="save" type="submit" name="save_task" value="Save">
        </div>
      </form>
    </div>

  </div>

  <div class="tasks">
            <div class="table-tasks">
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Book</th>
                            <th scope="col">Review</th>
                            <th scope="col">Date</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
        $query = "SELECT * FROM task";
        $result_tasks = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
                        <tr>
                            <th scope="row"><?php echo $row['title']; ?></th>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td>
                            <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
                            </td>
                          </tr>
                          <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

</main>

<?php include('includes/footer.php'); ?>