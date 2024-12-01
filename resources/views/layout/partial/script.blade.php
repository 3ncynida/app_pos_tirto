<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
<!-- Ion Slider -->
<script src="{{ asset('AdminLTE/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<!-- Bootstrap slider -->
<script src="{{ asset('AdminLTE/plugins/bootstrap-slider/bootstrap-slider.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
    $(function() {
        /* BOOTSTRAP SLIDER */
        $('.slider').bootstrapSlider()

        /* ION SLIDER */
        $('#range_1').ionRangeSlider({
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: '$',
            prettify: false,
            hasGrid: true
        })
        $('#range_2').ionRangeSlider()

        $('#range_5').ionRangeSlider({
            min: 0,
            max: 10,
            type: 'single',
            step: 0.1,
            postfix: ' mm',
            prettify: false,
            hasGrid: true
        })
        $('#range_6').ionRangeSlider({
            min: -50,
            max: 50,
            from: 0,
            type: 'single',
            step: 1,
            postfix: '°',
            prettify: false,
            hasGrid: true
        })

        $('#range_4').ionRangeSlider({
            type: 'single',
            step: 100,
            postfix: ' light years',
            from: 55000,
            hideMinMax: true,
            hideFromTo: false
        })
        $('#range_3').ionRangeSlider({
            type: 'double',
            postfix: ' miles',
            step: 10000,
            from: 25000000,
            to: 35000000,
            onChange: function(obj) {
                var t = ''
                for (var prop in obj) {
                    t += prop + ': ' + obj[prop] + '\r\n'
                }
                $('#result').html(t)
            },
            onLoad: function(obj) {
                //
            }
        })
    })
</script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    $(document).ready(function() {

        // Default date range (start and end of the current month)
        let start = moment().startOf('month');
        let end = moment().endOf('month');

        // Check if there's a previous selection from the server (e.g., after form submission)
        @if (request('date_range'))
            // Parse the previous date range value
            const dates = "{{ request('date_range') }}".split(" - ");
            start = moment(dates[0], 'YYYY-MM-DD');
            end = moment(dates[1], 'YYYY-MM-DD');
        @endif

        // Initialize date range picker
        $('#date_range').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            startDate: start,
            endDate: end,
        }, function(start, end) {
            // Update the date range input field with the selected range
            $('#date_range').val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
            // Update the hidden inputs with start and end dates
            $('#start_date').val(start.format('YYYY-MM-DD'));
            $('#end_date').val(end.format('YYYY-MM-DD'));
        });

        // Set initial values for hidden inputs
        $('#start_date').val(start.format('YYYY-MM-DD'));
        $('#end_date').val(end.format('YYYY-MM-DD'));

        // Set initial display for date range input
        $('#date_range').val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));

        // Reset button functionality
        $('#resetButton').click(function() {
            window.location.href = "{{ route('sekolah.report.index') }}";
        });

    });
</script>
