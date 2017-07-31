$(function() {
  $('#transaksi').DataTable();
  // 
  $(document).on('change', '.checkotw', function() {
      $(this).parents('tr').toggleClass('warning');
      $(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
      var token = $('input[name="_token"]').val();
      $.ajax({
          url: 'otworder/' + this.value,
          type: 'PUT',
          data: "otw=" + this.checked + "&_token=" + token
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

  // 
  $(document).on('change', '.checkdone', function() {
      $(this).parents('tr').toggleClass('success');
      $(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
      var token = $('input[name="_token"]').val();
      $.ajax({
          url: 'doneorder/' + this.value,
          type: 'PUT',
          data: "done=" + this.checked + "&_token=" + token
      })
      .done(function() {
          $('.fa-spin').remove();
          $('input[type="checkbox"]:hidden').show();
      })
      .fail(function() {
          $('.fa-spin').remove();
          var chk = $('input[type="checkbox"]:hidden');
          chk.show().prop('checked', chk.is(':checked') ? null:'checked').parents('tr').toggleClass('success');
          alert('Error');
      });
  });
  
} );