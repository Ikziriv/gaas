$(document).ready(function() {
// -------------------------------------------------------
  // readProduk();
  // -------------------------------------------------------
  // function readProduk()
  // {
  //   $('#loadingmessage').show();
  //   $.ajax({
  //     type: 'get',
  //     url: "{{url('readProduk')}}",
  //     dataType: 'html',
  //     success:function(data){
  //       $('#loadingmessage').hide();
  //       $('.table-responsive').html(data);
  //     }
  //   })
  // }
  // Create Modal Show
  $(document).on('click', '.create-modal', function(){
    $('.modal-title').text('Tambah Stock Produk');
    $('#form-create').show();
    $('#produk_id').val($(this).data('id'));
    $('#qty').val("");
    $('#createModal').modal('show');
  });
  // Click function ajax create
  $('.modal-footer').on('click', '.create', function(e){
    var produk_id = $('#produk_id').val();
    var qty = $('#qty').val();
    $.post('createstockProduk', {
        '_token' : $('input[name=_token]').val(),
        'produk_id' : produk_id,
        'qty' : qty

      }, 
      function(data){            
        if ( data.status === 'success' ) {
            toastr.options = {
            "closeButton": true,
            "positionClass": "toast-bottom-right"
          },
            toastr.success( data.data );
            setInterval(function() {
                window.location.reload();
          }, 2000);
        } else {
            toastr.options = {
            "closeButton": true,
            "positionClass": "toast-bottom-right"
          },
            toastr.error( data.status === 'failed');
            setInterval(function() {
                window.location.reload();
          }, 3000);
        }

    });
  });
  // Edit Modal Show
  $(document).on('click', '.edit-modal', function(){
    $('.modal-title').text('Ubah Data Produk');
    $('#form-edit').show();
    $('#id').val($(this).data('id'));
    $('#nama').val($(this).data('nama'));
    $('#editModal').modal('show');
  });
  // Click function ajax edit
  $('.modal-footer').on('click', '.edit', function(e){
    var id = $('#id').val();
    var nama = $('#nama').val();
    $.post('editproduk', {
        '_token' : $('input[name=_token]').val(),
        'id' : id,
        'nama' : nama
      }, 
      function(data){            
        if ( data.status === 'success' ) {
            toastr.options = {
            "closeButton": true,
            "positionClass": "toast-bottom-right"
          },
            toastr.success( data.data );
            setInterval(function() {
                window.location.reload();
          }, 2000);
        } else {
            toastr.options = {
            "closeButton": true,
            "positionClass": "toast-bottom-right"
          },
            toastr.error( data.status === 'failed');
            setInterval(function() {
                window.location.reload();
          }, 3000);
        }

    });
  });
  // Datatable Produk
  $('#produk').DataTable();
  // Add customer click
  $('#add-produk').on('click', function() {
    $('#show-form-produk').modal();
  })

  // Edit Modal Show
  $(document).on('click', '.edit-modal-show', function(){
    $('.modal-title').text('Ubah Stock Produk');
    $('#form-showedit').show();
    $('#e_id').val($(this).data('id'));
    $('#e_produk_id').val($(this).data('produk_id'));
    $('#e_qty').val($(this).data('qty'));
    $('#showeditModal').modal('show');
  });
  // Click function ajax update
  $('.modal-footer').on('click', '.showedit', function(e){
    var id = $('#e_id').val();
    var produk_id = $('#e_produk_id').val();
    var qty = $('#e_qty').val();
    $.post('editstockProduk', {
        '_token' : $('input[name=_token]').val(),
        'id' : id,
        'produk_id' : produk_id,
        'qty' : qty

      }, 
      function(data){   
        if ( data.status === 'success' ) {
            toastr.options = {
            "closeButton": true,
            "positionClass": "toast-bottom-right"
          },
            toastr.success( data.data );
            setInterval(function() {
                window.location.reload();
          }, 2000);
        } else {
            toastr.options = {
            "closeButton": true,
            "positionClass": "toast-bottom-right"
          },
            toastr.error('Ubah Data Pelanggan Gagal!');
            setInterval(function() {
                window.location.reload();
          }, 2000);
        }

    });
  });

  /* Remove */
  $('.remove-detail').on('click', function(e) {
    e.preventDefault();
       var $form = $(this).closest('form'),
       prod_data = $('#form_del_detial').serialize(),
       p_id = $(this).attr('data-id');

    swal({
        title: "Anda yakin?",
        text: "Kamu akan menghapus data ini!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, dihapus!",
        closeOnConfirm: true
      },
      function() {
      $.ajax({
          type: 'POST',
          url: 'detailproduk/delete' + '/' + p_id,
          data: prod_data,
          success: function( msg ) {
          if ( msg.status === 'success' ) {
              toastr.options = {
              "closeButton": true,
              "positionClass": "toast-bottom-right"
            },
              toastr.success( msg.msg );
              setInterval(function() {
                  window.location.reload();
              }, 2000);
            }
          },
          error: function( msg ) {
              if ( msg.status === 422 ) {
                  toastr.error('Tidak Bisa Dihapus!');
              }
          }
      });

      return false;
      });
  }); 

});
