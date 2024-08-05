$(document).ready(function() {
    $('#sacerdoteDropdown1 a').click(function(e) {
        e.preventDefault();
        var selectedSacerdote1 = $(this).data('sacerdote');
        $('#selectedSacerdote1').val(selectedSacerdote1);
    });

    $('#sacerdoteDropdown2 a').click(function(e) {
        e.preventDefault();
        var selectedSacerdote2 = $(this).data('sacerdote');
        $('#selectedSacerdote2').val(selectedSacerdote2);
    });

    $('#sacerdoteDropdown3 a').click(function(e) {
        e.preventDefault();
        var selectedSacerdote3 = $(this).data('sacerdote');
        $('#selectedSacerdote3').val(selectedSacerdote3);
    });

    $('#sacerdoteDropdown4 a').click(function(e) {
        e.preventDefault();
        var selectedSacerdote4 = $(this).data('sacerdote');
        $('#selectedSacerdote4').val(selectedSacerdote4);
    });

});


/* document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = ['flexCheckDefault1', 'flexCheckDefault2', 'flexCheckDefault3', 'flexCheckDefault4'];
    const inputs = ['capillaInput1', 'capillaInput2', 'capillaInput3', 'capillaInput4'];
  
    checkboxes.forEach((checkboxId, index) => {
      const checkbox = document.getElementById(checkboxId);
      const input = document.getElementById(inputs[index]);
  
      checkbox.addEventListener('change', function() {
        if (this.checked) {
          input.style.display = 'block';
        } else {
          input.style.display = 'none';
        }
      });
    });
  });
   */
