<!doctype html>
<html lang="tr">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

<div class="container-fluid mt-2">
    <div class="row justify-content-center">
        <form class='col-4' method="post" action="manage.php">
            <div class='card' id="div_login">
                <h1 class='card-header'>Login</h1>
                <div class='card-body'>
                    <input type="text" class="mb-2 form-control" id="txt_uname" name="user" placeholder="Username" />
                    <input type="password" class="form-control" id="txt_uname" name="password" placeholder="Password"/>
                </div>
                <div class='card-footer'>
                <input type="submit" class='btn btn-primary' value="Login" name="but_submit" id="but_submit" />
                </div>
            </div>
        </form>
    </div>

    <div class="row justify-content-center">
        <form class='col-4 mt-3' method="post" action="register.php">
            <div class='card' id="div_login">
                <h1 class='card-header'>Register</h1>
                <div  class='card-body'>
                    <input type="text" class="mb-2 form-control" id="txt_uname" name="user" placeholder="Username" />
                    <input type="password" class="form-control" id="txt_uname" name="password" placeholder="Password"/>
                </div>
                <div class='card-footer'>
                    <input type="submit" class='btn btn-primary' value="Register" name="but_submit" id="but_submit" />
                    <a href="index.php"><input class='btn btn-primary' value="Home" class="but_main" /></a>
                </div>
            </div>
        </form>
    </div>
    
	
	
</div>
</html>
