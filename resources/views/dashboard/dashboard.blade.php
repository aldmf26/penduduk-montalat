@extends('theme.app')
@section('content')
<style>
    .card:hover {
        background-color: #dde2f1;
      transform: translateY(-5px);
      transition: all 0.2s ease-in-out;
    }
    </style>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-heading">
            <h3 style="text-transform: capitalize">Sistem informasi Penduduk</h3>
        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                       

                        @foreach ($datas as $i => $d)
                        <div class="col-lg-4">

                            <div class="card">
                                <div class="card-body d-flex align-items-center">
                                    <div class="me-auto">
                                        <h5 class="card-title">{{ $d['title'] }}</h5>
                                        <h2 class="card-number">{{ $d['count'] }}</h2>
                                    </div>
                                    <div class="ms-auto">
                                        <i class="bi {{ $d['icon'] }} fs-1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        @endforeach

                    </div>
                </div>
            </div>
        </div>


        {{-- <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2023 &copy; Pengadilan Negeri Banjarmasin</p>
            </div>
            <div class="float-end">
                <p> <span class="text-danger"><i class=" "></i></span> <a
                        href="https://saugi.me">PN Banjarmasin Kelas 1A</a></p>
            </div>
        </div>
    </footer> --}}
    </div>
@endsection
