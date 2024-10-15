<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>myFlow</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset("vendor/fontawesome-free/css/all.min.css") }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="bi bi-tsunami"></i>
                </div>
                <div class="sidebar-brand-text mx-3">myFlow</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Projects Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Projetos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acessos rápidos:</h6>
                        <a class="collapse-item" href="{{route('projetos.create')}}">Cadastro</a>
                        <a class="collapse-item" href="{{route('projetos.index')}}">Listagem</a>
                        <a class="collapse-item" href="{{route('projetos.config')}}">Configurações</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Delineamentos Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDelineamentos"
                    aria-expanded="true" aria-controls="collapseDelineamentos">
                    <i class="bi bi-clipboard-fill"></i>
                    <span>Delineamentos</span>
                </a>
                <div id="collapseDelineamentos" class="collapse" aria-labelledby="headingDelineamentos"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acessos rápidos:</h6>
                        <a class="collapse-item" href="{{route('delineamentos.create')}}">Cadastro</a>
                        <a class="collapse-item" href="{{route('delineamentos.index')}}">Listagem</a>
                        <a class="collapse-item" href="{{route('delineamentos.config')}}">Configurações</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Detalhamento Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDetalhamento"
                    aria-expanded="true" aria-controls="collapseDetalhamento">
                    <i class="bi bi-clipboard2-data-fill"></i>
                    <span>Detalhamento</span>
                </a>
                <div id="collapseDetalhamento" class="collapse" aria-labelledby="headingDetalhamento"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acessos rápidos:</h6>
                        <a class="collapse-item" href="{{route('detalhamentos.create')}}">Cadastro</a>
                        <a class="collapse-item" href="{{route('detalhamentos.index')}}">Listagem</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Lista de Materiais Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLM"
                    aria-expanded="true" aria-controls="collapseLM">
                    <i class="fa fa-th-list"></i>
                    <span>Lista de Materiais</span>
                </a>
                <div id="collapseLM" class="collapse" aria-labelledby="headingLM" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acessos rápidos:</h6>
                        <a class="collapse-item" href="utilities-color.html">Cadastro</a>
                        <a class="collapse-item" href="utilities-border.html">Listagem</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Requisição de Compras Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRC"
                    aria-expanded="true" aria-controls="collapseRC">
                    <i class="bi bi-send-plus-fill"></i>
                    <span>Requisição de Compras</span>
                </a>
                <div id="collapseRC" class="collapse" aria-labelledby="headingRC" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acessos rápidos:</h6>
                        <a class="collapse-item" href="utilities-color.html">Cadastro</a>
                        <a class="collapse-item" href="utilities-border.html">Listagem</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Transferências de Materiais Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransferencias"
                    aria-expanded="true" aria-controls="collapseTransferencias">
                    <i class="bi bi-folder-symlink-fill"></i>
                    <span>Transferências de Mat.</span>
                </a>
                <div id="collapseTransferencias" class="collapse" aria-labelledby="headingTransferencias"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acessos rápidos:</h6>
                        <a class="collapse-item" href="utilities-color.html">Cadastro</a>
                        <a class="collapse-item" href="utilities-border.html">Listagem</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Recebimento de Materiais Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRecebimento"
                    aria-expanded="true" aria-controls="collapseRecebimento">
                    <i class="bi bi-box-seam-fill"></i>
                    <span>Recebimento de Mat.</span>
                </a>
                <div id="collapseRecebimento" class="collapse" aria-labelledby="headingRecebimento"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acessos rápidos:</h6>
                        <a class="collapse-item" href="utilities-color.html">Cadastro</a>
                        <a class="collapse-item" href="utilities-border.html">Listagem</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Relatório de Recebimento de Materiais Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRelatorio"
                    aria-expanded="true" aria-controls="collapseRelatorio">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>Relatório de Recebimento de Materiais</span>
                </a>
                <div id="collapseRelatorio" class="collapse" aria-labelledby="headingRelatorio"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acessos rápidos:</h6>
                        <a class="collapse-item" href="utilities-color.html">Cadastro</a>
                        <a class="collapse-item" href="utilities-border.html">Listagem</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Reserva de Materiais Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReserva"
                    aria-expanded="true" aria-controls="collapseReserva">
                    <i class="bi bi-cart-dash-fill"></i>
                    <span>Reserva de Materiais</span>
                </a>
                <div id="collapseReserva" class="collapse" aria-labelledby="headingReserva"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acessos rápidos:</h6>
                        <a class="collapse-item" href="utilities-color.html">Cadastro</a>
                        <a class="collapse-item" href="utilities-border.html">Listagem</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Programação da Fábrica Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProgramacao"
                    aria-expanded="true" aria-controls="collapseProgramacao">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Programação da Fábrica</span>
                </a>
                <div id="collapseProgramacao" class="collapse" aria-labelledby="headingProgramacao"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acessos rápidos:</h6>
                        <a class="collapse-item" href="utilities-color.html">Cadastro</a>
                        <a class="collapse-item" href="utilities-border.html">Listagem</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Configurações -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConfig"
                    aria-expanded="true" aria-controls="collapseConfig">
                    <i class="bi bi-gear wide"></i>
                    <span>Configurações</span>
                </a>
                <div id="collapseConfig" class="collapse" aria-labelledby="headingConfig"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acessos rápidos:</h6>
                        <a class="collapse-item" href="{{route('config.indexUsers')}}">Usuários</a>
                        <a class="collapse-item" href="{{route('config.indexPermission')}}">Permissões</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0 mb-3">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="{{asset("img/undraw_profile.svg")}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Informações
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    {{$slot}}
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Sair" se você deseja encerrar a sessão.</div>
                <div class="modal-footer">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Sair</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset("vendor/jquery/jquery.min.js")}}"></script>
    <script src="{{ asset("vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

    <!-- Popper.js (necessário para o Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>


    <!-- Core plugin JavaScript-->
    <script src="{{ asset("vendor/jquery-easing/jquery.easing.min.js")}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset("js/sb-admin-2.min.js")}}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset("vendor/chart.js/Chart.min.js")}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset("js/demo/chart-area-demo.js")}}"></script>
    <script src="{{ asset("js/demo/chart-pie-demo.js")}}"></script>

</body>

</html>