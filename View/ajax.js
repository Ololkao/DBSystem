$(document).ready(function () {

  $('#form1').submit(e => {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "../Controller/browse.php",
      data: $(this).serialize(),
      datatype: "html",
      success: result => {
        $('.tab_content').html(result);
        $('#sql').text('');
      }
    });
  });

  $('#form2').submit(e => {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "../Controller/delete.php",
      data: $(this).serialize(),
      datatype: "html",
      success: result => {
        $('.tab_content').html(result);
        $('#sql').text('');
      }
    });
  });

  $('#form3').submit(e => {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "../Controller/add.php",
      data: $(this).serialize(),
      datatype: "html",
      success: result => {
        $('.tab_content').html(result);
        $('#sql').text('');
      }
    });
  });

  $('#form4').submit(e => {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "../Controller/edit.php",
      data: $(this).serialize(),
      datatype: "html",
      success: result => {
        $('.tab_content').html(result);
        $('#sql').text('');
      }
    });
  });

  $('#form5').submit(e => {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "../Controller/nested.php",
      cache: false,
      data: $(this).val(),
      // data: $(this).serialize(),
      datatype: "json",
      success: result => {
        msg = eval(result);
        $('#sql').text('');
        $('.tab_content').html(msg[0]);
        for (let i = 1; i < msg.length; i++) {
          $('#sql').append(msg[i] + '\n');
        }
        // $('#sql').append(msg[1]);
      }
    });
  });

  $('#form6').submit(e => {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "../Controller/aggfunc.php",
      cache: false,
      data: $(this).val(),
      // data: $(this).serialize(),
      datatype: "json",
      success: result => {
        msg = eval(result);
        $('#sql').text('');
        $('.tab_content').html(msg[0]);
        for (let i = 1; i < msg.length; i++) {
          $('#sql').append(msg[i] + '\n');
        }
        // $('#sql').append(msg[1]);
      }
    });
  });
});