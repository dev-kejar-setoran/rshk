<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PJNHK | Backend</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">

    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url_file');?>assets/semantic/semantic.min.css">
    <link rel="stylesheet" href="<?php echo $this->config->item('base_url_file');?>assets/plugins/sweetalert/sweetalert2.min.css">

    <link rel="stylesheet" href="<?php echo $this->config->item('base_url_file');?>assets/css/app.css">
    <style type="text/css">
    .ui.file.input input[type="file"] {
        display: none;
    }
    .ui.button>.ui.floated.label {
        position: absolute;
        top: 15px;
        right: -10px;
    }
    .table tr th{
        white-space: nowrap;
    }
</style>
<!-- @yield('css') -->
<!-- @yield('styles') -->
</head>

<body id="app">

    <header>
        <?php $this->load->view('templete/header'); ?>
    </header>

    <div class="ui sidebar inverted visible vertical menu">
        <?php $this->load->view('templete/sidebar'); ?>
    </div>

    <div id="cover">
        <div class="ui active inverted dimmer">
            <div class="ui text loader">Loading</div>
        </div>
    </div>
    <div class="pusher content shown">
        <message></message>
        <div class="main ui fluid container" id="main-container">

            <div class="title-container">
                <div class="ui breadcrumb">
                    <a href="#" class="section"><i class="home icon"></i></a>
                    <i class="right chevron icon divider"></i>
                    <div class="active section">Dashboard</div>
                </div>
                <h2 class="ui header">
                    <div class="content">
                        Dashboard
                        <div class="sub header"> </div>
                    </div>
                </h2>
            </div>

            <div class="ui clearing divider" style="border-top: none !important; margin:10px"></div>
            <div class="ui grid dashboard-helper">
                <div class="four wide column">
                    <div class="ui blue inverted segment center aligned">
                        <div class="ui statistics">
                            <div class="statistic">
                                <div class="value">
                                    <i class="search icon"></i> 5
                                </div>
                                <div class="label">
                                    Item 1
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="four wide column">
                    <div class="ui teal inverted segment center aligned">
                        <div class="ui statistics">
                            <div class="statistic">
                                <div class="value">
                                    <i class="suitcase icon"></i> 5
                                </div>
                                <div class="label">
                                    Item 2
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="four wide column">
                    <div class="ui orange inverted segment center aligned">
                        <div class="ui statistics">
                            <div class="statistic">
                                <div class="value">
                                    <i class="folder icon"></i> 5
                                </div>
                                <div class="label">
                                    Item 3
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="four wide column">
                    <div class="ui red inverted segment center aligned">
                        <div class="ui statistics">
                            <div class="statistic">
                                <div class="value">
                                    <i class="plane icon"></i> 5
                                </div>
                                <div class="label">
                                    Item 4
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui grid">
                <div class="ten wide column">
                    <h5 class="ui top attached header">
                        Sample Graph
                    </h5>
                    <div class="ui bottom attached segment">
                        <canvas id="graph-area"></canvas>
                    </div>
                </div>
                <div class="six wide column">
                    <h5 class="ui top attached header">
                        Sample Pie Chart
                    </h5>
                    <div class="ui bottom attached segment">
                        <div id="canvas-holder">
                            <canvas id="chart-area"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('templete/footer'); ?>

        <div v-cloak>
            <!-- @yield('additional') -->
        </div>
    </div>

    <!-- @yield('modals') -->

    <script>
    </script>
    <!-- <script src="../js/es6-promise.auto.min.js"></script> -->

    <script src="<?php echo $this->config->item('base_url_file');?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="<?php echo $this->config->item('base_url_file');?>assets/plugins/jQuery/jquery.form.min.js"></script>
    <script src="<?php echo $this->config->item('base_url_file');?>assets/plugins/jQueryUI/jquery-ui.min.js"></script>
    <script src="<?php echo $this->config->item('base_url_file');?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo $this->config->item('base_url_file');?>assets/plugins/fastclick/fastclick.js"></script>
    <script src="<?php echo $this->config->item('base_url_file');?>assets/plugins/sweetalert/sweetalert2.min.js"></script>
    <script src="<?php echo $this->config->item('base_url_file');?>assets/semantic/semantic.min.js"></script>

    <script src="<?php echo $this->config->item('base_url_file');?>assets/js/mfs-script.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.5/Chart.min.js">></script>
    <script src="<?php echo $this->config->item('base_url_file');?>assets/js/dummy.js"></script>

    <script>
        var ctx = document.getElementById('chart-area').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor()
                    ],
                    backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue
                    ],
                    label: 'Dataset 1'
                }],
                labels: [
                'Red',
                'Orange',
                'Yellow',
                'Green',
                'Blue'
                ]
            },
            options: {
                responsive: true,
                legend: {
                    display: true,
                    position: 'right'
                }
            }
        });

        var ctx = document.getElementById('graph-area').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                'November',
                'Desember',
                'Januari',
                'Februari',
                'Maret'
                ],
                datasets: [
                {
                    data: [
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor()
                    ],
                    backgroundColor: "rgba(255, 99, 132, .15)",
                    borderColor: "rgba(255, 99, 132, 1)",
                    label: 'Item 1',
                    lineTension: 0
                },{
                    data: [
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor()
                    ],
                    backgroundColor: "rgba(75, 192, 192, .15)",
                    borderColor: "rgba(75, 192, 192, 1)",
                    label: 'Item 2',
                    lineTension: 0
                },{
                    data: [
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor()
                    ],
                    backgroundColor: "rgba(54, 162, 235, .15)",
                    borderColor: "rgba(54, 162, 235, 1)",
                    label: 'Item 3',
                    lineTension: 0
                },{
                    data: [
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor(),
                    120 + randomScalingFactor()
                    ],
                    backgroundColor: "rgba(255, 159, 64, .15)",
                    borderColor: "rgba(255, 159, 64, 1)",
                    label: 'Item 4',
                    lineTension: 0
                }
                ],
            },
            options: {
                responsive: true,
                legend: {
                    display: true,
                    position: 'bottom'
                }
            }
        });
    </script>
</body>
</html>
