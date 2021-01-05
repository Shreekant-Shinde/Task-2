<?php
    session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Form</title>
    </head>
    <body class="container">
        <br>
        <div class="col-md-7 offset-md-3 div">
            <h4>Job Application Form</h4>
            <br>
            <form class="form-horizontal" action="sendMail.php" method="post">
                <div class="form-group row pb-2">
                    <label for="firstname" class="control-label col-sm-2">First Name<span class="mandatory">*<span></label>
                    <div class="col-sm-9">
                        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" required>
                    </div>
                </div>
                <div class="form-group row pb-2">
                    <label for="lastname" class="control-label col-sm-2">Last Name<span class="mandatory">*<span></label>
                    <div class="col-sm-9">
                        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" required>
                    </div>
                </div>
                <div class="form-group row pb-2">
                    <label for="email" class="control-label col-sm-2">Email<span class="mandatory">*<span></label>
                    <div class="col-sm-9">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
                    </div>
                </div>
                <div class="form-group row pb-2">
                    <label for="mobile" class="control-label col-sm-2">Mobile<span class="mandatory">*<span></label>
                    <div class="col-sm-9">
                        <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Mobile Number" pattern="/(7|8|9)\d{9}/" title="Enter Valid Mobile Number" value="<?php echo isset($_POST['mobile']) ? $_POST['mobile'] : '' ?>" required>
                    </div>
                </div>
                <div class="form-group row pb-2">
                    <label for="degree" class="control-label col-sm-2">Degree<span class="mandatory">*<span></label>
                    <div class="col-sm-9">
                        <input type="text" name="degree" id="degree" class="form-control" placeholder="Degree" value="<?php echo isset($_POST['degree']) ? $_POST['degree'] : '' ?>" required>
                    </div>
                </div>
                <div class="form-group row pb-2">
                    <label for="skills" class="control-label col-sm-2">Skills<span class="mandatory">*<span></label>
                    <div class="col-sm-9">
                        <input type="text" name="skills" id="skills" class="form-control" placeholder="Skills" value="<?php echo isset($_POST['skills']) ? $_POST['skills'] : '' ?>" required>
                    </div>
                    <span class="col-sm-1 tip" data-toggle="tooltip" title="Enter Skills seperated by comma">&#9432;</span>
                </div>
                <div class="form-group row pb-2">
                    <label for="experience" class="control-label col-sm-2">Experience</label>
                    <div class="col-sm-9">
                        <input type="text" name="experience" id="experience" class="form-control" placeholder="Skills" value="<?php echo isset($_POST['experience']) ? $_POST['experience'] : '' ?>">
                    </div>
                    <span class="col-sm-1 tip" data-toggle="tooltip" title="In years. (If applicable)">&#9432;</span>
                </div>
                <button class="btn btn-primary"type="submit" name="submit">Submit</button>
            </form>
            <div class="success">
                <?php if (isset($_SESSION['success'])){
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                } ?>
            </div>
            <div class="error">
                <?php if (isset($_SESSION['error'])){
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                } ?>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</html>
