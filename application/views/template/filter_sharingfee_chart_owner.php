<script>
    function rupiah2(angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for (var i = 0; i < angkarev.length; i++)
            if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
        return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
    }
</script>
<?php
$total = 0;
foreach ($harian2->result() as $value) {
    $total += $value->total_pendapatan_fee;
}
$rata_rata = $total / count($harian2->result());
$average = "Rp " . number_format((int)$rata_rata, 0, ",", ".");
?>
</script>
<script type="text/javascript">
    var change = {
        0: '0',
        1000000: 'Rp. 1.000.000',
        2500000: 'Rp. 2.500.000',
        5000000: 'Rp. 5.000.000',
        7500000: 'Rp. 7.500.000',
        10000000: 'Rp. 10.500.000'
    };
    Highcharts.chart('chart_sharingfee2', {
        chart: {
            height: 500,
            borderRadius: 10,
            borderColor: '#969696',
            borderWidth: 1,
            backgroundColor: '#e7e6e6',
            type: 'column'
        },
        title: {
            text: 'Pendapatan',
            align: 'left',
            style: {
                color: '#f4004a',
                fontWeight: 'bold',
                fontSize: "15px"
            },


        },
        xAxis: {
            categories: [
                // <?php foreach ($lap_sf as $lap) : ?> "<?php echo $lap->nama_dokter ?>",
                // <?php endforeach; ?>
                <?php foreach ($lap_sf as $lap) : ?> "<?php if ($lap->hari == 'Sunday') {
                                                            echo "Minggu";
                                                        } elseif ($lap->hari == 'Monday') {
                                                            echo "Senin";
                                                        } elseif ($lap->hari == 'Tuesday') {
                                                            echo "Selasa";
                                                        } elseif ($lap->hari == 'Wednesday') {
                                                            echo "Rabu";
                                                        } elseif ($lap->hari == 'Thursday') {
                                                            echo "Kamis";
                                                        } elseif ($lap->hari == 'Friday') {
                                                            echo "Jumat";
                                                        } elseif ($lap->hari == 'Saturday') {
                                                            echo "Sabtu";
                                                        }
                                                        ?><br><?php echo $lap->tgl ?>",
                <?php endforeach; ?>
            ],
            labels: {
                style: {
                    color: 'black',
                    fontWeight: 'bold'
                }
            },
            title: {
                enabled: true,
                text: '------ Rata2 pendapatan ------',
                style: {
                    fontWeight: 'normal'
                }
            }
        },
        yAxis: {
            labels: {
                formatter: function() {
                    var value = change[this.value];
                    return value !== 'undefined' ? value : this.value;
                }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b> Rp. {point.y:.1f},-</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0,
                borderRadius: 10,
                pointWidth: 20
            }
        },
        series: [{
            name: '',
            showInLegend: false,
            states: {
                hover: {
                    color: '#f40049'
                }
            },
            data: [
                <?php foreach ($lap_sf as $lap) : ?> {
                        color: '#f40049',
                        y: <?php echo $lap->total_pendapatan_fee ?>
                    },
                <?php endforeach; ?>
            ]

        }]
    });
</script>