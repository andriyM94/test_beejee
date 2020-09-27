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
      <a class="btn btn-outline-primary" href="/" id="log_in">Back</a>
    </header>
    
    <div class="text-center">
      <form class="form-signin" action="/main/login" method="post">
        <h1 class="h3 mb-3 mt-3 font-weight-normal">Please sign in</h1>
        <input name="username" type="name"  class="form-control mb-2" placeholder="User name" required="" autofocus="">
        <input name="password" type="password" class="form-control mb-2" placeholder="Password" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name='submit'>Sign in</button>
      </form>
    </div>


  </body>
</html>
