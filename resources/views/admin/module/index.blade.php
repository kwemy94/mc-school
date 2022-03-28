@extends('admin/layouts/admin_master')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
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
        
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Module</h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('all.module')}}">Home</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">This table displays all the available modules.</h3>
                
              </div>              

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th scope="col" width="5%">Id</th>
                    <th scope="col" width="5%">Code Module</th>
                    <th scope="col" width="25%">Module Name</th>
                    <th scope="col" width="55%">Module Description</th>
                    <th scope="col" width="15%">Action</th>
                  </tr>
                  </thead>
                  <tbody>

                @foreach($modules as $module)  
                  <tr>
                    <td>{{$modules->firstItem()+$loop->index}}</td>
                    <td>{{$module->code_module}} </td>
                    <td>{{$module->nom_module}} </td>
                    <td>{{$module->description}}</td>                  
                    <td> 
                        <div class="btn-group btn-group-sm">
                            <a href="{{url('/module/show/'.$module->id)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            <a href="{{url('/module/edit/'.$module->id)}}" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                            <a href="{{url('module/delete/'.$module->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                          </div>
                    </td>
                  </tr>
                @endforeach
                
                  </tbody>
                  <a href="{{ route('add.module')}}"><button class="btn btn-info">Add Module</button></a>
                  <br><br>
                </table>
               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

 
  <!-- trash -->

