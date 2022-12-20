<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link
      rel="shortcut icon"
      href="/images/Nuansa-logo-warna.png"
      type="image/x-icon"
    /> -->
    <title><?= $title; ?></title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/lineicons.css" />
    <link rel="stylesheet" href="/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="/css/fullcalendar.css" />
    <link rel="stylesheet" href="/css/fullcalendar.css" />
    <link rel="stylesheet" href="/css/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="/css/datatables.min.css"/>
    <link href="/toggle/css/bootstrap4-toggle.min.css" rel="stylesheet">
  <script src="/js/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="/js/gauge/gauge.min.js"></script>

  <script src="/js/Chart.min.js"></script>
  <!-- <script src="/js/Chart.js"></script> -->
    <script crossorigin src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
    <script type="text/javascript" src="/js/datatables.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  </head>
  
  <body>
  
    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper overflow-hidden">
      <div class="navbar-logo">
        <a href="<?= base_Url('/'); ?>">
          <img src="/images/udayana.png" alt="logo" class="img-fluid w-50" />
        </a>
      </div>
      <nav class="sidebar-nav" >
        <ul class="navMenus">
        <li class="nav-item menus <?php if($title == "Home | Smart PJU") echo 'active';?>">
            <a href="<?= base_url('/') ?> " class="menu2">
              <span class="icon">
              <i class="fas fa-columns"></i></span>
              <span class="text">Home</span>
            </a>
          </li>
        <li class="nav-item menus <?php if($title == "Controlling | Smart PJU") echo 'active';?>">
            <a href="<?= base_url('/control') ?> " class="menu2">
              <span class="icon">
              <i class="fa-sharp fa-solid fa-toggle-on"></i>                                                 </span>
              <span class="text">Controlling</span>
            </a>
          </li>
    <li class="nav-item nav-item-has-children">
            <a
              href="#0"
              class="collapsed"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_1"
              aria-controls="ddmenu_1"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon">
              <i class="fa-sharp fa-solid fa-gauge"></i>     
                   </span>
              <span class="text">Monitoring</span>
            </a>
            <ul id="ddmenu_1" class="collapse dropdown-nav">
              <?php 
              $db = \Config\Database::connect();
              $query = $db->query("SELECT id,meta,nama_lampu FROM datalampu ");
              $result = $query->getResultArray();  
              
              foreach ($result as $menulampu):
              ?>
              <li>
                <a href="<?= base_url('/monitoringlamp'.'/'.$menulampu['meta'])?>"> <?= $menulampu['nama_lampu'] ?> </a>
              </li>
              <?php endforeach ?>
            </ul>
          </li>
          <li class="nav-item nav-item-has-children">
            <a
              href="#0"
              class="collapsed"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_2"
              aria-controls="ddmenu_2"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon">
              <i class="fa-solid fa-pager"></i>      
                   </span>
              <span class="text">Device</span>
            </a>
            <ul id="ddmenu_2" class="collapse dropdown-nav">
              <?php 
              $db = \Config\Database::connect();
              $query = $db->query("SELECT id,meta,nama_device FROM datadevice ");
              $result = $query->getResultArray();  
              
              foreach ($result as $devices):
                # code...
      
              ?>
              <li>
                <a href="<?= base_url('/monitoring'.'/'.$devices['meta'])?>"> <?= $devices['nama_device'] ?> </a>
              </li>
              <?php endforeach ?>
            </ul>
          </li>
       
          <li class="nav-item nav-item-has-children">
            <a
              href="#0"
              class="collapsed"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_3"
              aria-controls="ddmenu_3"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon">
              <i class="fa-solid fa-table"></i>    
                   </span>
              <span class="text">Data</span>
            </a>
            <ul id="ddmenu_3" class="collapse dropdown-nav">
              <li>
              <a href="<?= base_url('/device')?>">
             
				<span class="text">Data Device</span>
              </a>             
			        </li>
              <li>
			  <a href="<?= base_url('/user')?>">
              
              <span class="text">Data User</span>
            </a>
		              </li>
              <li>
			  <a href="<?= base_url('/lamp')?>">
              
              <span class="text">Data Lamp</span>
            </a>            
		  </li>
            </ul>
          </li>
          
          
          <span class="divider"><hr /></span>
          <li class="nav-item menus">
            <a href="<?= base_url('/maintenance')?>">
              <span class="icon">
              <i class=" fa-solid fa-screwdriver-wrench"></i>
                          </span>
              <span class="text">Maintenance</span>
            </a>
          </li>
          <li class="nav-item menus">
            <a href="<?= base_url('/report')?>" class="menu2">
              <span class="icon">
              <i class="fa-solid fa-file-invoice"></i>                          </span>
              <span class="text">Report</span>
            </a>
          </li>
          <li class="nav-item menus <?php if($title == "System Log | Smart PJU") echo 'active';?>">
            <a href="<?= base_url('/log')?>">
              <span class="icon">
              <i class="fa-solid fa-file-lines"></i>
              </span>
              <span class="text">System Log</span>
            </a>
          </li>
       
          <span class="divider"><hr /></span>

          <li class="nav-item">
            <a href="notification.html">
              <span class="icon">
              <i class="fa-solid fa-bell"></i>
              </span>
              <span class="text">Notifications</span>
            </a>
          </li>
        </ul>
      </nav>
    
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->
      <header class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
              <div class="header-left d-flex align-items-center">
                <div class="menu-toggle-btn mr-20">
                  <button
                    id="menu-toggle"
                    class="main-btn primary-btn btn-hover"
                  >
                    <i class="lni lni-chevron-left me-2"></i> Menu
                  </button>
                </div>
                <div class="header-search d-none d-md-flex">
                  <form action="#">
                    <input type="text" placeholder="Search..." />
                    <button><i class="lni lni-search-alt"></i></button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
              <div class="header-right">
                <!-- notification start -->
           
                <!-- notification end -->
                <!-- message start -->
              
                <!-- message end -->
                <!-- filter start -->
             
                <!-- filter end -->
                <!-- profile start -->
                <div class="profile-box ml-15">
                  <button
                    class="dropdown-toggle bg-transparent border-0"
                    type="button"
                    id="profile"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <div class="profile-info">
                      <div class="info">
                       <?php 
                        $nama = session()->get('nama');
                       ?>
                        <h6><?php echo $nama; ?></h6>
                        <div class="image">
                          <img
                            src="/images/profile/profile-image.png"
                            alt=""
                          />
                          <span class="status"></span>
                        </div>
                      </div>
                    </div>
                    <i class="lni lni-chevron-down"></i>
                  </button>
                  <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="profile"
                  >
                    <li>
                      <a href="#0">
                        <i class="lni lni-user"></i> View Profile
                      </a>
                    </li>
                   
                    <li>
                      <a href="#0"> <i class="lni lni-inbox"></i> Messages </a>
                    </li>
                    <li>
                      <a href="#0"> <i class="lni lni-cog"></i> Settings </a>
                    </li>
                    <li>
                      <a href="/logout"> <i class="lni lni-exit"></i> Sign Out </a>
                    </li>
                  </ul>
                </div>
                <!-- profile end -->
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- ========== header end ========== -->
      <section class="section pt-30">
       <div class="container-fluid">

        <!-- ========== section start ========== -->
        <?php $this->renderSection('content')?>
       </div>
      <!-- ========== section end ========== -->
      </section>
      <!-- ========== footer start =========== -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 order-last order-md-first">
              <div class="copyright text-center text-md-start">
                <p class="text-sm">
                  Developed by
                  <a
                    href="<?= base_url('/') ?>"
                    rel="nofollow"
                    target="_blank"
                  >
                    Dharma Lesmana 
                  </a>
                </p>
              </div>
            </div>
            <!-- end col-->
            <div class="col-md-6">
              <div
                class="
                  terms
                  d-flex
                  justify-content-center justify-content-md-end
                "
              >
                <a href="#0" class="text-sm ml-15"><i class="fa fa-copyright" aria-hidden="true"></i> <?= date('Y'); ?></a>
              </div>
            </div>
          </div>
          <!-- end row -->
        </div>
        <!-- end container -->
      </footer>
      <!-- ========== footer end =========== -->
    </main>
   
    <!-- ======== main-wrapper end =========== -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZ1vBYV-pf6hSYPwvaAcKMD36JWI8MyAY&callback=myMap&v=weekly"></script>
    <script src="/js/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="/js/gauge/gauge.min.js"></script>


    <script type="text/javascript" src="/js/datatables.min.js"></script>
    <script src="/toggle/js/bootstrap4-toggle.min.js"></script>

    <!-- ========= All Javascript files linkup ======== -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/dynamic-pie-chart.js"></script>
    <script src="/js/moment.min.js"></script>
    <script src="/js/fullcalendar.js"></script>
    <script src="/js/jvectormap.min.js"></script>
    <script src="/js/world-merc.js"></script>
    <script src="/js/polyfill.js"></script> 
    <script src="/js/main.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  </body>
</html>
