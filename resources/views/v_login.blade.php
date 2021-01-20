<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/login.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <title>Login</title>
</head>

<body>
  <div class="container">
    <div class="wrapper-login">
      <div class="row ">
        <div class=" ">
          <div class="ribbon">
            <img src="/image/ribbon.png" alt="Ribbon login" />
          </div>
        </div>
        <div class="">
          <div class="logo-login">
            <a href="http://">
              <img src="/image/logo.png" class="img-fluid" alt="Logo login" />
            </a>
            <span class="logo-p">People Innovation Excellence</span>
          </div>
        </div>
      </div>
      <hr />
      @if(\Session::has('alert'))
      <div class="alert alert-danger">
        <div>{{Session::get('alert')}}</div>
      </div>
      @endif
      <form action="/auth_login" method="post">
        @csrf
        <div class="form-login">
          <div class="input-group mb-3 ">
            <div class="input-group-prepend">
              <span class="input-group-text user" id="basic-addon1">
                <img src="/image/user.svg" alt="" />
              </span>
            </div>
            <input type="text" name="email" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" autofocus></input>
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">
                @binus.edu
              </span>
            </div>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text user" id="basic-addon1">
                <img src="/image/password.svg" alt="" />
              </span>
            </div>
            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2"></input>
            <small id="passwordHelpBlock" class="form-text text-muted">
              Your password must be 8-20 characters long, contain letters and
              numbers, and must not contain spaces, special characters, or
              emoji.
            </small>
            <Button type="submit" class="btn btn-primary btn-block" href="#" role="button">
              LOGIN
            </Button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="/assets/jquery-3.5.1.js"></script>
  <script src="/js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="/js/bootstrap.min.js"></script>
</body>

</html>