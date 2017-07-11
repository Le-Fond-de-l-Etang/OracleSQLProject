/**
 * Created by hugo on 20/04/2017.
 */
$(function() {
    $(".datepicker").datepicker(

    );
    $("#addLieuModal").on("show.bs.modal", function (event) {
        var button = event.relatedTarget;
        $("input").val("");
        console.log(button);
        if ($(button).data("id") !== undefined) {

            var elem = $(button).parent().parent().children("td");
            var id = elem[0].innerHTML;
            var nom = elem[1].innerHTML;
            var ville = elem[2].innerHTML;
            var pays = elem[3].innerHTML;
            var descriptif = elem[4].innerHTML;
            var prix = elem[5].innerHTML
            $("#lieu_id").val(id);
            $("#lieu_nom").val(nom);
            $("#lieu_ville").val(ville);
            $("#lieu_pays").val(pays);
            $("#lieu_descriptif").val(descriptif);
            $("#lieu_prix").val(prix);

        }
    })
    $("#addClientModal").on("shown.bs.modal", function (event) {
        var button = event.relatedTarget;
        $("input").val("");

        if ($(button).data("id") !== undefined) {
            console.log(button);
            var elem = $(button).parent().parent().children("td");
            var id = elem[0].innerHTML;
            var nom = elem[1].innerHTML;
            var prenom = elem[2].innerHTML;
            var datedenaissance = elem[3].innerHTML;
            var admin = elem[4].innerHTML;
            if(admin.includes("admin")){
                $("#client_administrateur").prop("checked",true)
            }else{
                $("#client_administrateur").prop("checked",false)
            }
            $("#client_id").val(id)
            $("#client_nom").val(nom);
            $("#client_prenom").val(prenom);
            $("#client_datedenaissance").val(datedenaissance);
            $("#client_password").val("")
        }
    });
});
