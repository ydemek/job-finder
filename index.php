<!doctype html>

<?php
session_start();
?>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.search-box input[type="text"]').on("keyup input", function() {
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".liveresult");

        if (inputVal.length) {
          $.get('live-search.php', {
            term: inputVal
          }).done(function(data) {
            resultDropdown.html(data);
          });
        } else {
          resultDropdown.empty();
        }
      });

      $(document).on("click", ".liveresult li", function() {

        $.get('result.php', {
          term: $(this).text()
        }).done(function(data) {
          var node = document.getElementById("result_list")
          node.innerHTML = data;
        });

        $(this).parent(".liveresult").empty();
      });
    });
  </script>


  <title>Job Lister</title>

</head>

<body>
  <div class="container">
    <div class="row mt-3 d-flex flex-row justify-content-between">
        <div class="col-8 search-box">
          <h4>Job Lister</h4>
          <input type="text" class="form-control " autocomplete="off" placeholder="Search position..." />
          <ul class="list-group liveresult"></ul>
          <ul class="result_view" id="result_list">

        </div>
        <div></div>
        <div class="col-4 d-flex mb-auto align-items-center justify-content-end">
          <?php
          if (isset($_SESSION["admin"])) {
            echo '<a href="admin.php">
                    <input type="button" value="Management" class="btn btn-primary  mt-4"/>
                  </a>' 
                  .
                  '<a href="logout.php">
                    <input type="button" value="Logout" class="btn btn-danger ml-2 mt-4"/>
                   </a>';
          } else if (isset($_SESSION["user"])) {
            echo  '<a href="user.php">
                    <input type="button" value="Profile" class="btn btn-primary mr-2 mt-4"/>
                  </a>' 
                  .
                  '<a href="logout.php">
                    <input type="button" value="Logout" class="btn btn-danger mt-4"/>
                   </a>';
          } else {
            echo '<a href="login.php"><input type="button" value="Login" class="btn btn-primary mt-4"/></a>';
          }
          ?>
        </div>
    </div>

  </div>
  </div>
</body>

</html>