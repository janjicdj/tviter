$('#formaObjava').submit(function (){
    event.preventDefault();

    const $form = $(this);
    const $input = $form.find('input, textarea');

    const data=$form.serialize();

    console.log(data);

    $input.prop('disabled',true);

        req=$.ajax({
            url: 'objava/add.php',
            type:'post',
            data: data
        });


    $input.prop('disabled',false);
    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno sačuvana objava");
            location.reload();
        }else{
            alert("Neuspešno sačuvana objava")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

$('#pretraga').on("keyup", function() {
    let tekst = $('#pretragaInput').val();
    let filter = tekst.toLowerCase();
    let divovi = document.getElementsByClassName('objava');

    for(let i=0;i<divovi.length;i++){

        let vidljiv=false;


        let p = divovi[i].getElementsByTagName("p")[0];
        if (p) {
            tekst = p.textContent || p.innerText;
            if (tekst.toLowerCase().indexOf(filter) > -1) {
                vidljiv=true;
            }
        }

        if(vidljiv){
            divovi[i].style.display = "";
        }else{
            divovi[i].style.display = "none";
        }
    }

});

$('#sortirajBtn').click(function (){

    let sortirano = false;

    while (!sortirano) {
        sortirano = true;
        let objave = document.getElementsByClassName("objava");
        let zaZamenu;
        let i
        for (i = 0; i < objave.length-1; i++) {
            zaZamenu = false;
            let el1 = objave[i].getElementsByTagName("p")[0];
            let el2 = objave[i + 1].getElementsByTagName("p")[0];
            if (el1.innerHTML.toLowerCase() > el2.innerHTML.toLowerCase()) {
                zaZamenu = true;
                break;
            }
        }
        if (zaZamenu) {
            objave[i].parentNode.insertBefore(objave[i + 1], objave[i]);
            sortirano = false;
        }
    }
});