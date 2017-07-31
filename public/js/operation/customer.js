$(function() {
  $('#customer').DataTable();

  // Active function
  $(document).on('change', '.checkactive', function() {
      $(this).parents('tr').toggleClass('warning');
      $(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
      var token = $('input[name="_token"]').val();
      $.ajax({
          url: 'customer/active/' + this.value,
          type: 'PUT',
          data: "active=" + this.checked + "&_token=" + token
      })
      .done(function() {
          $('.fa-spin').remove();
          $('input[type="checkbox"]:hidden').show();
          //$('#tbtransaksi').load(location.href = '#tbtransaksi');
      })
      .fail(function() {
          $('.fa-spin').remove();
          var chk = $('input[type="checkbox"]:hidden');
          chk.show().prop('checked', chk.is(':checked') ? null:'checked').parents('tr').toggleClass('warning');
          alert('Error');
      });
  });
  // ------------------------------------------------------
  // Create Modal Show
  $(document).on('click', '.create-modal', function(){
    $('.modal-title').text('Tambah Pelanggan');
    $('#form-create').show();
    $('#createModal').modal('show');
  });
  // Click function ajax create
  $('.modal-footer').on('click', '.create', function(e){
    var id = $('#id').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var alamat = $('#alamat').val();
    var tlp = $('#tlp').val();
    var active = $('#active').val();
    $.post('createcustomer', {
        '_token' : $('input[name=_token]').val(),
        'id' : id,
        'name' : name,
        'email' : email,
        'alamat' : alamat,
        'tlp' : tlp,
        'active' : active

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
            toastr.error('Create Customer Data Failed!');
            setInterval(function() {
                window.location.reload();
          }, 2000);
        }

    });
  });
  // ------------------------------------------------------
  // Edit Modal Show
  $(document).on('click', '.edit-modal', function(){
    $('.modal-title').text('Ubah Data Pelanggan');
    $('#form-edit').show();
    $('#e_id').val($(this).data('id'));
    $('#e_name').val($(this).data('name'));
    $('#e_email').val($(this).data('email'));
    $('#e_alamat').val($(this).data('alamat'));
    $('#e_tlp').val($(this).data('tlp'));
    $('#e_active').val($(this).data('active'));
    $('#editModal').modal('show');
  });
  // Click function ajax edit
  $('.modal-footer').on('click', '.edit', function(e){
    var id = $('#e_id').val();
    var name = $('#e_name').val();
    var email = $('#e_email').val();
    var alamat = $('#e_alamat').val();
    var tlp = $('#e_tlp').val();
    var active = $('#e_active').val();
    $.post('editcustomer', {
        '_token' : $('input[name=_token]').val(),
        'id' : id,
        'name' : name,
        'email' : email,
        'alamat' : alamat,
        'tlp' : tlp,
        'active' : active

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
  $('.remove-customer').on('click', function(e) {
    e.preventDefault();
       var $form = $(this).closest('form'),
       cus_data = $('#form_del_customer').serialize(),
       c_id = $(this).attr('data-id');

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
          url: 'customer/delete' + '/' + c_id,
          type: 'POST',
          data: cus_data,
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
          error: function( data ) {
              if ( data.status === 422 ) {
                  toastr.error('Tidak Bisa Dihapus!');
                  setInterval(function() {
                      window.location.reload();
                }, 2000);
              }
          }
      });

      return false;
      });
  }); 


});