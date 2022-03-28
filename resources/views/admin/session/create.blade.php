@extends('admin/layouts/admin_master')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h2> Session</h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('all.module')}}">Home</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


<div class="card card-primary">
    <section class="content">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add a Session</h3>
 
              </div>

              
              
              @if(session('success'))
              <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
              </svg>
              <div class="alert alert-success d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    {{session('success')}}
                  </div>
                </div>
              @endif



              <form action="{{route('store.session')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="inputClientCompany">Numero Session</label>
                    <input type="text" name="numero_session" id="inputClientCompany" class="form-control" placeholder="Nom Module">
  
                    @error('numero_session')
                          <span class="text-danger"> {{ $message }} </span>
                      </div>
                    @enderror
                  </div>

                <div class="form-group">
                    <label for="dataDebut">Date Debut:</label>
                    <input type="date" id="dataDebut" name="date_debut">

                  @error('date_debut')
                  <div >
                    <span class="text-danger">{{ $message }} </span>
                </div>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="dateFin">Date Fin:</label>
                    <input type="date" id="DateFin" name="date_fin">
                    
                  @error('date_fin')
                  <div >
                    <span class="text-danger">{{ $message }} </span>
                </div>
                  @enderror
                </div>
               
                <div class="form-group">
                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" name="statut" class="custom-control-input" id="customSwitch3">
                    <label class="custom-control-label" for="customSwitch3">Statut</label>
                  </div>
                  @error('statut')
                  <div >
                    <span class="text-danger">{{ $message }} </span>
                </div>
                  @enderror
                </div>
                    

               
               
              <div class="row">
                <div class="col-12">
                  <a href="{{ route('all.session')}}" class="btn btn-secondary">Cancel</a>
                  <input type="submit" value="Enregistrer" class="btn btn-success float-right">
                </div>
              </div>
            </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
  
        </div>
  
      </section>
    

