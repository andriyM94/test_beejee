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
      <a class="btn btn-outline-primary" href="/main/login" id="log_in">Log In</a>
    </header>
    <section class="main_content container mt-2">
    
      
    </div>
      <div class="row">
        <div class="col-8 mt-4">

          
          <div class="col-12">
            Sort by:
            <div>
            Имя пользователя: <a href="/main/main/username/asc/">&#9650;</a><a href="/main/main/username/desc/">&#9660;</a>
            Еmail: <a href="/main/main/email/asc/">&#9650;</a><a href="/main/main/email/desc/">&#9660;</a>
            Статус: <a href="/main/main/status/asc/">&#9650;</a><a href="/main/main/status/desc/">&#9660;</a>
            </div>
          </div>

          <div class="contett_tasks d-flex flex-column flex-md-row">
            <?php 
              foreach ($tasks as $key => $value) {
                  ?>
                  <div class="card border-secondary m-2" style="width: 18rem">
                    <div class="card-header">
                      <div class="user_name">Еmail: <br><?php echo $value['email']?> <hr></div>
                      <div class="status">Статус:
                        <?php 
                          if ($value['status'] == 1) {
                              echo "выполнено"; 
                            } else {
                              echo "впроцесе";
                        }
                        ?>
                      </div>
                    </div>
                    <div class="card-body text-secondary">
                      <h5 class="card-title">Имя пользователя: <?php echo $value['username']?> <hr></h5>
                      <p class="card-text"> Текст задачи: <br>
                        <?php echo $value['text_task']?>
                      </p>
                    </div>
                    <div class="card-header border-top">
                      <?php 
                        if ($value['onchange'] == 1) {
                          echo "отредактировано администратором"; 
                        } else {
                          echo "";
                        }
                      ?>
                    </div>
                  </div>
                  <?php
              }
            ?>
          </div> 

          <nav aria-label="Page navigation example">
            <?php 
            $num = 3;
            if (isset($_GET['page'])) {
              $page = $_GET['page'];
            } else {
              $page = 1;
            }
            
            $posts = $count;
            $total = intval(($posts - 1) / $num) + 1;
            $page = intval($page);

            $start = $page * $num - $num;

            ?>
            <ul class="pagination justify-content-center">
              <?php
              if ($count != 0) {

                if ($_SERVER["REQUEST_URI"] == '/') {
                  $s_path = 'main/main/';
                } else {
                  $arrr_path = explode('?', $_SERVER["REQUEST_URI"]);
                  $s_path = $arrr_path[0];
                }
                for ($i=1; $i < $total+1; $i++) { 
                  if ($page == $i) {
                     ?>
                    <li class="page-item active"><a class="page-link"><?php echo $i?></a></li>
                  <?php
                  } else {
                    ?>
                    <li class="page-item"><a class="page-link" href="<?php echo $s_path;?>?page=<?php echo $i?>"><?php echo $i?></a></li>
                  <?php
                  }
                }
              } 
              ?>
            </ul>
          </nav>
        </div>

        <div class="col-4 card border-secondary mt-4">
          <h2 class="mt-2 text-center">New Task</h2>
          <form class="border-secondary m-2 mt-3" action='/main/newtask' method='POST'>
            <div class="form-group">
              <label for="exampleFormControlInput1">Email address</label>
              <input
                type="email"
                class="form-control"
                id="exampleFormControlInput1"
                required=""
                name="email"
                placeholder="Email address"
                
              />
            </div>
            <div class="form-group">
              <label for="exampleFormControlInpu2">User name</label>
              <input
                type="text"
                class="form-control"
                required=""
                name="username"
                id="exampleFormControlInput2"
                placeholder="User name"
              />
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Task text</label>
              <textarea
              required=""
                class="form-control"
                name="text_task"
                id="exampleFormControlTextarea1"
                rows="3"
              ></textarea>
              <button type="submit" class="btn btn-primary mt-2 col-12">
                Send task
              </button>
            </div>
          </form>
          <div class="message"></div>
        </div>
      </div>
    </section>

  </body>
</html>
