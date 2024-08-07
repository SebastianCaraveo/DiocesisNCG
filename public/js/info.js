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
