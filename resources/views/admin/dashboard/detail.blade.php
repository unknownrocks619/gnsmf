<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" />
</head>
<body>
    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">GNSMF</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="btn btn-danger" type="submit">Logout</button>
            </form>
          <!-- <a class="nav-link" href="#">Logout</a> -->
        </li>
      </ul>
    </div>
  </div>
</nav>


<!-- Page Content -->
<section class="py-5 my-5">
  <div class="container">
    <h2 class="fw-light">Candidate Detail</h2>
    <a href="{{ route('dashboard') }}">Go back</a>
    <!-- Candidate Detail -->
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold">
                {{ $candidate->first_name . " " .$candidate->last_name }}</span>
                <span class="text-black-50">
                    <a href="mailto:{{ $candidate->email_address}}"> {{ $candidate->email_address   }}</a>
                </span>
                <span> </span>
                <span class="text-black-50">{{ $candidate->phone_number }}</span><span> </span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Applied Post</h4>
                </div>
                <div class="row mt-2">
                    @forelse ($candidate->posts as $post)
                        <div class="col-md-12">
                            <h5 class="px-2 pl-4 bg-primary text-large text-white">
                                @php
                                    $explode = explode("-",$post->post_name);
                                    $string = "";

                                    foreach ($explode as $key => $value) {
                                        $string .= ucwords($value) . " ";
                                    }
                                    echo $string;
                                @endphp
                            </h5>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <h4 class="text-danger">Not Applied for any post</h4>
                        </div>
                    @endforelse
                    <hr />
                    @if ( ! empty ($candidate->documents) )
                        @foreach ($candidate->documents as $doc)
                            @php
                                $title = explode("-",$doc->title);
                                $file = json_decode($doc->file_detail);
                            @endphp
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-title">
                                        <h4 class="card-header">{{ $title[0] . " ". $title[1] }}</h4>
                                    </div>
                                    <img src="{{ asset ($file->path)}}" alt="" class="img-fluid">
                                </div>

                            </div>
                            
                        @endforeach
                    @endif 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Upload Documents</h4>
                </div>
            </div>
           

            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <td>Document Type</td>
                        <td>

                        </td>
                    </tr>
                </thead>
                @forelse ($candidate->documents as $document)
                    <tr>
                        <td>
                            @php
                                $string_explode = explode("-",$document->title);
                                echo ucwords($string_explode[0]) . " " . ucwords($string_explode[1]);

                                $get_file_detail = json_decode($document->file_detail);
                            @endphp
                        </td>
                        <td>
                            <a href="{{ asset ($get_file_detail->path) }}" target="_blank">View / Download</a>
                        </td>
                    </tr>
                @empty
                    
                @endforelse
            </table>
        </div>
    </div>

    <!-- /Candidate Detail -->
  </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>