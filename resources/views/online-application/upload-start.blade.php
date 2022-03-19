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
    <form enctype="multipart/form-data" action="{{ route('vacancy_upload_file_store',encrypt($user->id)) }}" method="post">
        @csrf
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card px-5 pb-4">
                    <div class="content"> <i class="fa fa-logo"></i> <span>Gajendra Narayan Singh Memorial Foundation</span> </div>
                    <div class="content1">
                        <h3>Online Application :: File Upload</h3>
                    </div>
                    <div class="mt-2">
                    <x-auth-session-status class="mb-4 alert alert-danger" :status="session('error')" />
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="post">
                                        Please Select Your Post
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <select name="post" id="post" class="form-control">
                                        @foreach ($v_post as $post)
                                            <option value="{{ \Str::slug($post,'-') }}">
                                                {{ $post }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error("post")
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="entry">
                                    <span>Application Form
                                        <sup class="text-danger">*</sup>
                                    </span>
                                    <input type="file" name="application_form_file" class="form-control" />
                                    <small class="text-danger">Accepted Format: pdf, jpg or png, Max Size: 1 MB</small>
                                    @error("application_form_file")
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 my-2 bg-light p-2">
                            <div class="col-md-6">
                                <div class="entry"> 
                                    <span>Voucher (Receipt) Number 
                                        <sup class="text-danger">*</sup>
                                    </span> 
                                    <input placeholder="Voucher or Receipt Number" name="voucher_number" value="{{ old('v_number') }}" class="form-control" />
                                    @error("voucher_number")
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="entry">
                                    <span>Upload Voucher
                                        <sup class="text-danger">*</sup>
                                    </span> 
                                    <input type="file" name="voucher_file" class="form-control" />
                                    <small class="text-danger">Accepted Format: pdf,jpg or png, Max Size: 1 MB</small>
                                    @error("voucher_file")
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="row g-2 my-2 bg-light p-2">
                            <div class="col-md-6">
                                <div class="entry"> 
                                    <span>Education Qualification Ceritifcate 
                                        <sup class="text-danger">*</sup>
                                        <br />
                                        <small class="text-info">PDF should contain all your education qualification certificates</small>
                                    </span> 
                                    <input type="file" name="education_file" class="form-control"  />
                                    <small class="text-danger">Accepted Format: PDF,jpg or png Max Size: 2 MB</small>
                                    @error("education_file")
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="entry">
                                    <span>Experience Certificate / Letter
                                        <br />
                                    <small class="text-info">PDF should contain all your experience certificates</small>
                                    </span> 
                                    <input type="file" name="experience_letter" class="form-control"  />
                                    <small class="text-danger">Accepted Format: PDF,jpg or png Max Size: 2 MB</small>
                                    @error("experience_letter")
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="row g-2 my-2 bg-light p-2">
                            <div class="col-md-6">
                                <div class="entry"> 
                                    <span>Citizenship Front 
                                        <sup class="text-danger">*</sup>
                                    </span> 
                                    <input type="file" name="citizenship_front_file" class="form-control"  />
                                    <small class="text-danger">Accepted Format: jpg or png, Max Size: 1 MB</small>
                                    @error("citizenship_front_file")
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="entry">
                                    <span>Citizenship Back</span> 
                                    <input type="file" name="citizenship_back_file" class="form-control"  />
                                    <small class="text-danger">Accepted Format: pdf, jpg or png, Max Size: 1 MB</small>
                                    @error("citizenship_back_file")
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mt-2">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-dark w-100">Save & Continue</button> </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>