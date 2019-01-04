<?php
/**
 * Mange Member Page
 * You Can Add & Delete From Here
 */
session_start();

$pageTittle = 'Members';
if (isset($_SESSION['Usename'])) {
    include 'init.php';

    if (isset($_GET['do'])) {
        $do = $_GET['do'];
    } else {
        $do = 'Manage';
    }
    //Start Manage Page
    if ($do == 'Manage') {
        echo 'Welcome You Are In Mange Category Page';

        /* Start Edit Page*/
    } elseif ($do == 'Edit') {

        //Check If UserId Is Numerical & Get The Integer Value Of It
        $UserID = isset($_GET['UserID']) && is_numeric($_GET['UserID']) ? intval($_GET['UserID']) : 0;

        //select All Data Depend on Id
        $stmt = $con->prepare("SELECT * FROM users WHERE UserID = ? LIMIT 1");
        $stmt->execute(array($UserID));
        $row = $stmt->fetch();
        // If There Is Change Or Not
        $count = $stmt->rowCount();
        //If There's Such Id Show The Form
        if ($count = $stmt->rowCount() > 0) { ?>

            <h1 class="text-center">Edit Member</h1>
            <div class="container">
                <form action="?do=Update" method="POST">
                    <input type="hidden" name="UserID" value="<?php echo $UserID ?>">
                    <!--Start Username Field-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-lg-4 col-md-6 col-sm-2">
                            <input type="text" name="username" class="form-control"
                                   value="<?php echo $row['Username'] ?>" autocomplete="off">
                        </div>
                    </div>
                    <!--End Username Field-->

                    <!--Start Password Field-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-lg-4 col-md-6 col-sm-2">
                            <input type="hidden" name="oldpassword" value="<?php echo $row['Password'] ?>">
                            <input type="password" name="newpassword" class="form-control" autocomplete="new-password">
                        </div>
                    </div>
                    <!--End Password Field-->

                    <!--Start Email Field-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-lg-4 col-md-6 col-sm-2">
                            <input type="email" name="email" class="form-control" value="<?php echo $row['Email'] ?>">
                        </div>
                    </div>
                    <!--End Email Field-->

                    <!--Start Full Name Field-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Full Name</label>
                        <div class="col-lg-4 col-md-6 col-sm-2">
                            <input type="text" name="full" class="form-control" value="<?php echo $row['FullName'] ?>">
                        </div>
                    </div>
                    <!--End Full Name Field-->

                    <!--Start Submit Field-->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="Save" class="btn btn-primary btn-lg">
                        </div>
                    </div>
                    <!--End Submit Field-->
                </form>
            </div>

            <?php
            // If There's No Such Id  Else Show Error Message
        } else {
            echo 'There Is No Such Id';
        }
    } elseif ($do == 'Update') {//Update Page
        echo "<h1 class='text-center'>Update Member</h1>";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Get The Variables From The Form
            $id=$_POST['UserID'];
            $user=$_POST['username'];
            $email=$_POST['email'];
            $name=$_POST['full'];

            //password
            //Condition ? True :false;
            $pass=empty($_POST['newpassword'])? $pass=$_POST['oldpassword']: $pass=sha1($_POST['newpassword']);

            //Update The Database With This Info
            $stmt = $con->prepare("UPDATE users SET Username = ?, Email = ?,FullName = ?,Password = ? WHERE UserID = ?");
            $stmt->execute(array($user,$email,$name,$pass,$id));
            //Echo Success Message
            echo $stmt->rowCount() .'Record Update';

        } else {
            echo 'Sorry You Can not Browse This Page';
        }
    }

    include $tpl . 'footer.inc';
} else {
    echo 'you are not allow to view this page';
    header('location: index.php'); //Redirect To Dashboard Page
    exit();
}