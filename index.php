<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div> -->

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Registered Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
               <h4>Users</h4>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-fw  fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <!-- jumlah laporan tiap bagian -->
    <div class="col-xl-3 col-md-6 mb-4">	
		<div class="chart-container" style="position: relative; height:40vh; width:80vw">
			<canvas id="myChart"></canvas>
		</div>
	</div>

  <div class="col-xl-1">	
		<div class="chart-container" style="position: relative; height:40vh; width:80vw">
		</div>
	</div>
  
   <!-- Laporan Bulanan dan Laporan Tahunan (LKIP) -->
   <div class="col-xl-3 col-md-6 mb-4">	
		<div class="chart-container" style="position: relative; height:40vh; width:80vw">
			<canvas id="chart_jenis_laporan"></canvas>
		</div>
	</div>

  </div>

  <div class="row">
  <div class="card-body">
    <div class="table-responsive">
    <?php
        $connection = mysqli_connect("localhost","root","","adminpanel");
        $query      = "SELECT * FROM upload_file ORDER BY tanggal_input DESC LIMIT 10;";
        $query_run  = mysqli_query($connection,$query);
    ?>
      <table class="table table-bordered" id="dataTable"  width="100%" cellspacing="0">
          <thead>
          <tr>
            <th> No </th>
            <th> Judul Laporan </th>
            <th> Waktu </th>
          </tr>
        </thead>
      
        <tbody>
        <?php
          if(mysqli_num_rows($query_run) > 0)
          {
            $no=1;
            while($row = mysqli_fetch_assoc($query_run))
            {
                ?>
          <tr>
            <td> <?php echo $no?> </td>
            <td> <?php echo $row['judul']?> </td>
            <td> <?php echo $row['tanggal_input']?> </td>
          </tr>
          <?php   
          $no++; 
            }
          }
          else{
            // echo "No Record Found";
          }
        ?>
        </tbody>
      </table>

    </div>
  </div>

    <!-- Earnings (Monthly) Card Example -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Earnings (Monthly) Card Example -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Pending Requests Card Example -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
      new DataTable('#dataTable');
    </script>
  <script>
	const ctx = document.getElementById('myChart');
	new Chart(ctx, {
		type: 'doughnut',
		data: {
			labels: ['Kominter', 'Jatinter', 'Konvinter', 'Lotas', 'Damkeman', 'Bangtas','Renmin','Protokol'],
			datasets: [{
				label: '# of Votes',
				data: [  
                <?php 
                  $koneksi = mysqli_connect("localhost","root","","adminpanel");
                  $jumlah_laporan_kominter = mysqli_query($koneksi,"select * from upload_file where created_by='Kominter'");
                  echo mysqli_num_rows($jumlah_laporan_kominter);
                ?>, 
                 <?php 
                  $koneksi = mysqli_connect("localhost","root","","adminpanel");
                  $jumlah_laporan_jatinter = mysqli_query($koneksi,"select * from upload_file where created_by='Jatinter'");
                  echo mysqli_num_rows($jumlah_laporan_jatinter);
                ?>, 
                  <?php 
                  $koneksi = mysqli_connect("localhost","root","","adminpanel");
                  $jumlah_laporan_konvinter = mysqli_query($koneksi,"select * from upload_file where created_by='Konvinter'");
                  echo mysqli_num_rows($jumlah_laporan_konvinter);
                ?>, 
                 <?php 
                  $koneksi = mysqli_connect("localhost","root","","adminpanel");
                  $jumlah_laporan_lotas = mysqli_query($koneksi,"select * from upload_file where created_by='Lotas'");
                  echo mysqli_num_rows($jumlah_laporan_lotas);
                ?>, 
                 <?php 
                  $koneksi = mysqli_connect("localhost","root","","adminpanel");
                  $jumlah_laporan_damkeman = mysqli_query($koneksi,"select * from upload_file where created_by='Damkeman'");
                  echo mysqli_num_rows($jumlah_laporan_damkeman);
                ?>, 
                  <?php 
                  $koneksi = mysqli_connect("localhost","root","","adminpanel");
                  $jumlah_laporan_bangtas = mysqli_query($koneksi,"select * from upload_file where created_by='Bangtas'");
                  echo mysqli_num_rows($jumlah_laporan_bangtas);
                ?>,
                <?php 
                  $koneksi = mysqli_connect("localhost","root","","adminpanel");
                  $jumlah_laporan_renmin = mysqli_query($koneksi,"select * from upload_file where created_by='Renmin'");
                  echo mysqli_num_rows($jumlah_laporan_renmin);
                ?>,
                  <?php 
                  $koneksi = mysqli_connect("localhost","root","","adminpanel");
                  $jumlah_laporan_protokol = mysqli_query($koneksi,"select * from upload_file where created_by='Protokol'");
                  echo mysqli_num_rows($jumlah_laporan_protokol);
                ?>
              ],
				backgroundColor: [
					'rgba(255, 99, 71, 1)',
					'rgba(9, 31, 242, 0.8)',
					'rgba(240, 255, 45, 0.8)',
					'rgba(17, 231, 42, 0.8)',
					'rgba(201, 30, 255, 0.8)',
					'rgba(255, 128, 6, 0.8)',
          'rgba(60, 60, 60)',
          'rgba(180, 180, 180)'
					],
				borderColor: [
					'rgba(255, 99, 71, 1)',
					'rgba(9, 31, 242, 0.8)',
					'rgba(240, 255, 45, 0.8)',
					'rgba(17, 231, 42, 0.8)',
					'rgba(201, 30, 255, 0.8)',
					'rgba(255, 128, 6, 0.8)',
          'rgba(60, 60, 60)',
          'rgba(180, 180, 180)'
					],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		}
	});

  
  const ctxl = document.getElementById('chart_jenis_laporan');

  new Chart(ctxl, {
		type: 'doughnut',
		data: {
			labels: ['Laporan Bulanan', 'Laporan Tahunan (LKIP)'],
			datasets: [{
				label: '# of Votes',
				data: [
                <?php 
                  $koneksi = mysqli_connect("localhost","root","","adminpanel");
                  $jumlah_laporan_bulanan = mysqli_query($koneksi,"select * from upload_file where laporan_kategori='Laporan Bulanan'");
                  echo mysqli_num_rows($jumlah_laporan_bulanan);
                ?>,  
               <?php 
                  $koneksi = mysqli_connect("localhost","root","","adminpanel");
                  $jumlah_laporan_lkip = mysqli_query($koneksi,"select * from upload_file where laporan_kategori='Laporan LKIP'");
                  echo mysqli_num_rows($jumlah_laporan_lkip);
                ?>
              ],
				backgroundColor: [
					'rgba(255, 99, 71, 1)',
					'rgba(9, 31, 242, 0.8)',
					],
				borderColor: [
					'rgba(255, 99, 71, 1)',
					'rgba(9, 31, 242, 0.8)',
					],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		}
	});
</script>

  <!-- Content Row -->
  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>