<!--   Core JS Files   -->
<script src="{{asset('js/core/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('js/core/popper.min.js')}}"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{asset('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

<!-- Chart JS -->
<script src="{{asset('js/plugin/chart.js/chart.min.js')}}"></script>

<!-- jQuery Sparkline -->
<script src="{{asset('js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Chart Circle -->
<script src="{{asset('js/plugin/chart-circle/circles.min.js')}}"></script>

<!-- Datatables -->
<script src="{{asset('js/plugin/datatables/datatables.min.js')}}"></script>

<!-- Bootstrap Notify -->
<script src="{{asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

<!-- jQuery Vector Maps -->
<script src="{{asset('js/plugin/jsvectormap/jsvectormap.min.js')}}"></script>
<script src="{{asset('js/plugin/jsvectormap/world.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('js/plugin/sweetalert/sweetalert.min.js')}}"></script>

<!-- Kaiadmin JS -->
<script src="{{asset('js/kaiadmin.min.js')}}"></script>

<script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>


<!-- Kaiadmin DEMO methods, don't include it in your project! -->
{{-- <script src="{{asset('js/setting-demo.js')}}"></script>
<script src="{{asset('js/demo.js')}}"></script> --}}

<script>
    $(document).ready(function () {
      $("#basic-datatables").DataTable({});

      $("#multi-filter-select").DataTable({
        pageLength: 5,
        initComplete: function () {
          this.api()
            .columns()
            .every(function () {
              var column = this;
              var select = $(
                '<select class="form-select"><option value=""></option></select>'
              )
                .appendTo($(column.footer()).empty())
                .on("change", function () {
                  var val = $.fn.dataTable.util.escapeRegex($(this).val());

                  column
                    .search(val ? "^" + val + "$" : "", true, false)
                    .draw();
                });

              column
                .data()
                .unique()
                .sort()
                .each(function (d, j) {
                  select.append(
                    '<option value="' + d + '">' + d + "</option>"
                  );
                });
            });
        },
      });

      // Add Row
      $("#add-row").DataTable({
        pageLength: 5,
      });

      var action =
        '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

      $("#addRowButton").click(function () {
        $("#add-row")
          .dataTable()
          .fnAddData([
            $("#addName").val(),
            $("#addPosition").val(),
            $("#addOffice").val(),
            action,
          ]);
        $("#addRowModal").modal("hide");
      });
    });
  </script>