<?php

  if ($_POST["submit"]) {
    if (!$_POST["name"]) {
      $error = "<br />Please enter your name";
    }

    if (!$_POST["email"]) {
      $error .= "<br />Please enter your email";
    }

    if (!$_POST["comment"]) {
      $error .= "<br />Please enter your comment";
    }

    if ($_POST["email"]!="" AND !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $error .="<br />Please enter a valid email address";
    }

    if($error) {
      $result = '<div class="alert alert-danger"><strong>There was a problem in your form: </strong>'.$error.'</div>';
    } else {
    if (mail("dummyemail@fake.com", "Comment from website", 
      "Name: ".$_POST["name"].
      " Email: ".$_POST["email"].
      " Comment: ".$_POST["comment"])) {

      $result = '<div class="alert alert-success"><strong>Your comment was sent successfully!</strong></div>';

    } else {
      $result = '<div class="alert alert-danger"><strong>Sorry there was an error sending your message - please try again later!</strong></div>';
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PHP Form</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

    <style type="text/css">

      .emailForm {
        border: 1px solid gray;
        border-radius: 10px;
      }

      form {
        padding-bottom: 20px;
      }

      .container {
        padding-top: 20px;
      }

    </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 emailForm">
          <h1>My Email Form</h1>
          <?php echo $result; ?>
          <p class="lead">Please get in touch - I'll get back to you ASAP!</p>
          <form method="post">
            <div class="form-group">
              <label for="name">Your Name:</label>
              <input name="name" type="text" class="form-control" placeholder="Your name" value="<?php echo $_POST['name']; ?>" />
            </div>
            <div class="form-group">
              <label for="email">Your Email:</label>
              <input name="email" type="email" class="form-control" placeholder="Your email" value="<?php echo $_POST['email']; ?>" />
            </div>
            <div class="form-group">
              <label for="comment">Your Comment:</label>
              <textarea class="form-control" name="comment"><?php echo $_POST['comment']; ?></textarea>
            </div>
            <input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit" />
          </form>
        </div>
      </div>
    </div>





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
  </body>
</html>