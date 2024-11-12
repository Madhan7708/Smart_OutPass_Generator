<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .body {
        margin: 50px;
    }

    .bg-nav-pills {
        background-color: #f8f9fa;
    }

    .nav-pills .nav-link {
        color: #000;
        font-weight: 500;
        padding: 12px 2x;
    }

    .nav-pills .nav-link.active {
        background-color: #007bff;
        color: #fff;
    }

    .nav-link:hover {
        background-color: #007bff;
        color: #fff;
        transition: 0.3s;
    }

    .nav-justified .nav-item {
        flex: 1;
        text-align: center;
    }

    .btn {
        padding: 10px 50px;
        font-size: medium;
        border-radius: 10px;
        margin-left: 80px;
    }

    .btn:hover-effect {
        box-shadow: 0 0 50px red;
    }

    .psize {
        width: 300px;
    }

    .form {
        justify-content: center;
        margin-left: 320px;
    }

    .tab-content h4 {
        margin: 8px;
    }

    .tab-content label {
        margin: 0;
    }

</style>

<body>
    <div class="container">
        <div class="body">
            <hr>
            <center>
                <h2>Students OutPass Generator</h2>
            </center>
            <div style="width: 100%;" class="nave">

                <ul class="nav nav-pills bg-nav-pills nav-justified my-3" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link rounded-0 active nav-bas" id="students-tab" data-toggle="pill" href="#students" role="tab" aria-controls="students" aria-selected="true">Students</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link rounded-0" id="faculty-tab" data-toggle="pill" href="#faculty" role="tab" aria-controls="faculty" aria-selected="false">Faculty</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active form" id="students" role="tabpanel" aria-labelledby="students-tab">
                    <br>
                    <form action="login_backend.php" method="post">
                        <div class="form-group">
                            <label for="reg_no">
                                <h4>Student Register</h4>
                            </label>
                            <input type="text" class="form-control psize" id="reg_no" name="reg_no" placeholder="Enter register number" required>
                            <label for="password">
                                <h4>Password</h4>
                            </label>
                            <input type="password" class="form-control psize" id="password" name="password" required placeholder="Enter password">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <br>
                        <br>
                    </form>
                    <h5>Forget password?</h5>
                    <strong>
                        <p>Contact mail ID: <b>spnk@gmail.com</b></p>
                    </strong>
                </div>
                <div class="tab-pane fade form" id="faculty" role="tabpanel" aria-labelledby="faculty-tab">
                    <form>
                        <div class="form-group">
                            <br>
                            <label for="faculty_id">
                                <h4>Faculty ID</h4>
                            </label>
                            <input type="text" class="form-control psize" id="faculty_id" placeholder="Enter register number">
                            <label for="faculty_password">
                                <h4>Password</h4>
                            </label>
                            <input type="password" class="form-control psize" id="faculty_password" placeholder="Enter password">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <br>
                        <br>
                    </form>
                    <h5>Forget password?</h5>
                    <strong>
                        <p>Contact mail ID: <b>spnk@gmail.com</b></p>
                    </strong>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>