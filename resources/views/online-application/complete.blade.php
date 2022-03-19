<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacancy: Upload Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
    margin: 0;
    padding: 0
}

body {
    background-color: #406980
}

.card {
    display: flex;
    width: 100%;
    background-color: #fff
}

.content i {
    margin-top: 34px;
    font-size: 20px
}

.content span {
    align-items: center;
    font-size: 14px;
    font-weight: bold;
    color: #406980
}

.content1 h3 {
    margin-top: 34px;
    font-weight: bold
}

.content2 {
    font-size: 12px;
    color: #98A7B1
}

.entry {
    font-size: 11px;
    font-weight: bold
}

.form-control {
    height: 40px
}

.form-control:focus {
    outline: none;
    box-shadow: none;
    border: 1px solid #000
}

.btn {
    height: 43px;
    background-color: #406980;
    border: none
}

.icons span {
    height: 35px;
    width: 35px;
    background-color: #fff;
    border: 2px solid #eef0f1;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #406980
}
    </style>
</head> 
<body>
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card px-5 pb-4">
                <div class="content"> <i class="fa fa-logo"></i> <span>Gajendra Narayan Singh Memorial Foundation</span> </div>
                <div class="content1">
                    <h3>Thank You !</h3>
                </div>
                <div class="mt-2">
                    <div class="row g-2 my-2 bg-light p-2">
                        <div class="col-md-12">
                            <p>
                                We have received your application. You will be notified in your email once your documents are verified. 
                            </p>
                            <br />
                            &copy; {{ date("Y") }}. Gajendra Narayan Singh Memorial Foundation
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>