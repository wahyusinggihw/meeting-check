<?= $this->extend('dashboard/layout/dashboard_layout') ?>

<?= $this->section('content') ?>

<?php if (session()->get('role') == 'superadmin') : ?>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= $totalagenda ?></h3>

                    <p>Total Agenda Rapat</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= $totalAgendaTersedia ?></h3>

                    <p>Agenda Rapat Tersedia</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?= $totalAgendaSelesai ?></h3>

                    <p>Agenda Rapat Selesai</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- <div class="col-lg-3 col-6">
        
        <div class="small-box bg-success">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div> -->
    </div>
    <!-- /.row -->

    <div>
        <div class="table-container my-3">
            <table id="example" class="row-border" style="width:100%">
                <thead>
                    <tr>
                        <!-- <th>id</th> -->
                        <th>No</th>
                        <th>Kode Rapat</th>
                        <th>Instansi</th>
                        <th>Bidang</th>
                        <th>Agenda</th>
                        <th>Deskripsi</th>
                        <th>Tempat</th>
                        <th>Tanggal/Jam</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($agenda as $item) : ?>
                        <tr>
                            <td></td>
                            <td><?= $item['kode_rapat'] ?></td>
                            <td><?= $item['nama_instansi'] ?></td>
                            <td><?= $item['admin_nama_bidang'] ?></td>
                            <td><?= $item['agenda_rapat'] ?></td>
                            <td><?= $item['deskripsi'] ?></td>
                            <td><?= $item['tempat'] ?></td>
                            <td><?= $item['tanggal'] . ', ' . $item['jam'] ?></td>
                            <td><span class="badge <?= $item['status'] == 'selesai' ? 'bg-danger' : 'bg-success' ?>"><?= $item['status'] ?></td>

                        </tr>
                    <?php endforeach ?>

                    <!-- Add more rows as needed -->
                </tbody>

            </table>
        </div>
    </div>
<?php else : ?>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= $totalagenda ?></h3>

                    <p>Total Agenda Rapat</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?= $totalAgendaBelumBerjalan ?></h3>

                    <p>Agenda Rapat Belum Berjalan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= $totalAgendaSelesai ?></h3>

                    <p>Agenda Selesai</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <?php endif; ?>

    <!-- Small boxes (Stat box) -->


    <script>
        // show tables if element clicked
        $(document).ready(function() {
            $('#example').DataTable();
        });


        let startNumber = 1;
        new DataTable('#example', {
            "columnDefs": [{
                "targets": [null], // Index of the column to disable sorting (zero-based index)
                "orderable": false,

            }],
            // Additional DataTables options here
            createdRow: function(row, data, dataIndex) {
                $('td:eq(0)', row).html(startNumber++);
            }
        });
    </script>

    <?= $this->endSection() ?>