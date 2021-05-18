<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Symfony User Group Todo List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

</head>

<body>
  <div class="container-sm">
    <div class="card shadow rounded">
      <h1 class="card-title">Sample Todo List</h1>
      <div class="form-div">
        <form action="add_task.php" method="post" autocomplete="off" class="row">
          <div class="col">
            <input type="text" class="form-control" name="description">
          </div>
          <div class="col-2 d-grid">
            <input type="submit" class="btn btn-primary" value="Add Task">
          </div>


        </form>
      </div>
      <hr class="hr">
      <div class="task-list-div">
        <?php
        foreach ($tasks as $task) :;
        ?>
          <div class="row task-row">
            <div class="checkbox-div col-auto">
              <?php echo $task["completed"] ? "<input data-todo-id=${task['id']} class='checkbox align-middle' type='checkbox' checked>" : "<input data-todo-id=${task['id']} class='align-middle checkbox' type='checkbox'>" ?>

            </div>
            <div class="col <?php if ($task["completed"]) echo "strikethrough" ?>">
              <?php ?>
              <h2 class="description-text"><?= $task['description'] ?></h2>
              <p class="created-by-text">Created: <?= $task['timestamp'] ?></p>
              <?php ?>
            </div>
            <div class="col-auto button-div">
              <button id="<?= $task['id'] ?>" class="btn btn-primary delete-btn align-middle">Delete</button>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
  <style>
    .card {
      margin-top: 30px;
    }

    .card-title {
      text-align: center;
      margin: 20px;
    }

    .form-div {
      padding: 20px;
    }

    .task-list-div {
      padding: 20px;
      margin: 0 50px;
    }

    .description-text {
      margin-bottom: 0px;
    }

    .task-done-checkbox {
      width: 40px;
      margin: 20px;
    }

    .button-div {
      display: inherit;
    }

    .checkbox-div {
      display: inherit;
    }

    .delete-btn {
      margin: 15px 0px;
    }

    .task-row {
      margin-bottom: 10px;
    }

    hr {
      margin: 0 0px !important;
    }

    .created-by-text {
      margin: 0;
    }

    .strikethrough {
      text-decoration: line-through;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  <script>
    var removeButtons = document.getElementsByClassName("delete-btn");
    for (let removeButton of removeButtons) {
      removeButton.addEventListener("click", () => {
        let formData = new FormData();
        formData.append("id", removeButton.id);
        fetch('remove_task.php', {
          method: 'POST',
          body: formData,
        }).then((response) => {
          if (response.ok) {
            removeButton.parentElement.parentElement.remove(600);
          }
        }).then(function(data) {})

      })
    }

    var checkBoxes = document.getElementsByClassName("checkbox")
    for (let checkBox of checkBoxes) {
      checkBox.addEventListener("click", () => {
        let formData = new FormData();
        formData.append("id", checkBox.getAttribute('data-todo-id'));
        fetch('check_task.php', {
          method: 'POST',
          body: formData,
        }).then((response) => {
          if (response.ok) {
            return response.json();
          }
        }).then(function(data) {
          if (data) {
            checkBox.parentElement.parentElement.children[1].classList.add("strikethrough")
          } else {
            checkBox.parentElement.parentElement.children[1].classList.remove("strikethrough")
          }
        })
      })
    }
  </script>
</body>

</html>