<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../../../css/style.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  </head>
  <body>
    <header
      class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm"
    >
      <h5 class="my-0 mr-md-auto font-weight-normal"><a href="/">Test BeeJee</a></h5>
      <a class="btn btn-outline-primary" href="/admin/logOut">Log Out</a>
    </header>
    <section class="main_content container mt-2">
      <div class="row">
        <div class="col-8 mt-4">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">User name</th>
                <th scope="col">Email</th>
                <th scope="col">Tasks</th>
                <th scope="col">Status</th>
                <th scope="col">Change task?</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($tasks as $key => $value) {
                  ?>
                   <tr data-id="<?php echo $value['id']?>" onclick="editTask(this);">
                    <th scope="row"><?php echo $value['id']?></th>
                    <td><?php echo $value['username']?></td>
                    <td><?php echo $value['email']?></td>
                    <td><?php echo $value['text_task']?></td>
                    <td><?php echo $value['status']?></td>
                    <td><?php echo $value['onchange']?></td>
                  </tr>
                  <?php
              }
            ?>
            </tbody>
          </table>
        </div>

        <div class="col-4 card border-secondary mt-4" >
          <h2 class="mt-2 text-center">Edit Task <span id="title_id"></span></h2>
          
          <form class="border-secondary m-2 mt-3" action="/admin/edit" method="POST">
            <input id="id" type="hidden" name="id" value="">
            <div class="form-group">
              <label for="exampleFormControlInput1">Email address</label>
              <input id="email"
                type="email"
                class="form-control"
                id="exampleFormControlInput1"
                placeholder=""
                disabled
              />
            </div>
            <div class="form-group">
              <label for="exampleFormControlInpu2">User name</label>
              <input id="username"
                type="text"
                class="form-control"
                id="exampleFormControlInput2"
                placeholder=""
                disabled
              />
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Example textarea</label>
              <textarea id="text-task"
                class="form-control"
                id="exampleFormControlTextarea1"
                name="text_task"
                rows="3"
              ></textarea>
            </div>
            <div class="form-group">
              <h4 class="h4 dark-grey-text text-center">Status</h4>

              <section class="border p-2">
                <div class="form-check form-check-inline col-5">
                  <input
                    type="checkbox"
                    class="form-check-input"
                    id="status1"
                    name="status"
                  />
                  <label class="form-check-label" for="status1"
                    >Finish</label
                  >
                </div>

              </section>
            </div>
            <button id="edit-btn" type="submit" class="btn btn-primary mt-2 col-12">
              Edit task
            </button>
          </form>
        </div>
      </div>
      <script src="../../../js/main.js"></script>
    </section>
  </body>
</html>
