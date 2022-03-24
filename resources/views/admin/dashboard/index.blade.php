<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
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
    <h2 class="fw-light">Candidate List</h2>

    
    <table id="candidate_list_jquery" class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Applied Post</th>
                <th>Total Document</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($candidates as $candidate)
                <tr>
                    <td>
                        {{-- $loop->iteration --}}
                        {{ ucwords(strtolower($candidate->first_name)) . " " . ucwords(strtolower($candidate->last_name)) }}
                    </td>
                    <td>
                      {{ $candidate->email_address }}
                    </td>
                    <td>
                      @forelse ($candidate->posts as $post )
                            <span class="badge bg-primary badge-primary mx-1 px-2"> {{ ucwords($post->post_name) }}</span>     
                        @empty
                            <span class="badge bg-danger badge-danger">Not Applied</span>
                        @endforelse
                    </td>
                    <td>
                      {{ $candidate->documents_count }}
                    </td>
                    <td>
                      {{ ucwords($candidate->status) }}
                    </td>
                    <td>
                        <a href="{{ route('admin_candidate_detail',$candidate->id) }}">
                          View
                        </a>
                         | Delete
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            var table = $("#candidate_list_jquery").dataTable({
                // processing : true,
                // serverSide: true,
                // ajax : "{{ url()->full() }}",
                // columns: [
                //     {data : 'name', name: 'name'},
                //     {data : 'email', name : 'email'},
                //     {data : 'post', name : 'post'},
                //     {data : 'documents', name: 'documents'},
                //     {data : 'status' , name: 'status'},
                //     {data : 'action', name: 'action'}
                // ]
            })
        });
    </script>
</body>
</html>