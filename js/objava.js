$('#objavaStrana').submit(function(){
    event.preventDefault();

    const $form = $(this);
    const $input = $form.find('input, textarea');

    const data=$form.serialize();

    console.log(data);

    $input.prop('disabled',true);

    req=$.ajax({
        url: 'objava/update.php',
        type:'post',
        data: data
    });


    $input.prop('disabled',false);
    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno izmenjena objava");
            location.reload();
        }else{
            alert("Neuspešno izmenjena objava")

        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

$('#obrisiObjavu').click(function (){

    let idObjave = document.getElementsByName('idObjave')[0].value;
    console.log(idObjave)

    req=$.ajax({
        url: 'objava/delete.php',
        type:'post',
        data: {'id':idObjave}
    });



    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno obrisana objava");
            location.href="pocetna.php";
        }else{
            alert("Neuspešno obrisana objava")

        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });
});

$('#komentarForm').submit(function (){
    event.preventDefault();

    const $form = $(this);
    const $input = $form.find('input, textarea');

    const data=$form.serialize();

    console.log(data);

    $input.prop('disabled',true);

    req=$.ajax({
        url: 'komentar/add.php',
        type:'post',
        data: data
    });


    $input.prop('disabled',false);
    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno sačuvan komentar");
            location.reload();
        }else{
            alert("Neuspešno sačuvan komentar")

        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

function obrisiKomentar(id){
    req=$.ajax({
        url: 'komentar/delete.php',
        type:'post',
        data: {'id':id}
    });



    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno obrisan komentar");
            location.reload();
        }else{
            alert("Neuspešno obrisan komentar")

        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });
}