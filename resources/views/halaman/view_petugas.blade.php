@extends('index')
@section('title', 'Buku')

@section('isihalaman')
    <h3><center>Daftar Petugas Perpustakaan Meraih Mimpi</center></h3>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalpetugasTambah">
        Tambah Data Petugas
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID_petugas</td>
                <td align="center">nama_petugas</td>
                <td align="center">no_hp</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($petugas as $index=>$p)
                <tr>
                    <td align="center" scope="row">{{ ($petugas->currentpage()-1) * $petugas->perpage() + $loop->index + 1 }}</td>
                    <td>{{$p->id}}</td>
                    <td>{{$p->nama_petugas}}</td>
                    <td>{{$p->no_hp}}</td>
                    <td align="center">

                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalpetugasEdit{{$p->id}}">
                            Edit
                        </button>

                        <div class="modal fade" id="modalpetugasEdit{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="modalpetugasEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalpetugasEditLabel">Form Edit Data petugas</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formpetugasedit" id="formpetugasedit" action="/petugas/edit/{{ $p->id}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_petugas" class="col-sm-4 col-form-label">nama_petugas</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" placeholder="Masukan nama_petugas">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="no_hp" class="col-sm-4 col-form-label">no_hp</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $p->no_hp}}">
                                                </div>
                                            </div>


                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="bukutambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data buku -->
                        |
                        <a href="petugas/hapus/{{$p->id}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<!--awal pagination-->
Halaman : {{ $petugas->currentPage() }} <br />
    Jumlah Data : {{ $petugas->total() }} <br />
    Data Per Halaman : {{ $petugas->perPage() }} <br />

    {{ $petugas->links() }}
    <!--akhir pagination-->

    <div class="modal fade" id="modalpetugasTambah" tabindex="-1" role="dialog" aria-labelledby="modalpetugasTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalpetugasTambahLabel">Form Input Data petugas</h5>
                </div>
                <div class="modal-body">
                    <form name="formpetugastambah" id="formpetugastambah" action="/petugas/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_petugas" class="col-sm-4 col-form-label">nama_petugas</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" placeholder="Masukan nama_petugas">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-4 col-form-label">no_hp</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukan no_hp">
                            </div>
                        </div>


                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="petugastambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
