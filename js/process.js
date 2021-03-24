$(document).ready(function(){
    $('#btn-go1').hide();
    $('#gen1').hide();

    $('#show-input').click(function () {
        $('#show-input').hide();
        $('#gen1').fadeIn();
    })


    $('#gen1').keyup(function(){
        var link = $('#gen1').val();
        var twiterSite = "https://publish.twitter.com/?query=";
        var reslut = twiterSite+link;
        console.log(reslut);

        var a = document.getElementById('btn-go1');
        if(a.href = reslut){
            $('#btn-go1').fadeIn();
        }
        $('#btn-go1').click(function () {
            $('#gen1').val("");
            $('#btn-go1').hide();
            $('#gen1').hide();
            $('#show-input').fadeIn();
        });
    });



}); // doc end here