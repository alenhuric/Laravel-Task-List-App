<script type="text/javascript">
$(function () {
   $('#members').DataTable({
      "responsive": true,
      "processing": true,
      "serverSide": false,
      "fixedHeader": true,        
      'paging'      : true,
      'pageLength'  : 10,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'scrollX'     : false,
      'autoWidth'   : true, 
      dom: 'lBfrtip',
      "order": [[ 0, "desc" ]], //or asc
   })
})

</script>