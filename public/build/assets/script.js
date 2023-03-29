document.addEventListener("DOMContentLoaded", function(){

  
    var depId 
    var check = false 
    $('#departement').innerHtml=""
    $('#region').on('change', function() {
      //  $('#departement1').html("")
        $('#departement1').html("");

        $('#departement1').append('<option  value="">'+ "--Choisir un département--" +'</option>');
        $('#departement1').attr('disabled', true)
        $('#region1').html("")
        $('#region1').append('<option value="">'+ "--Choisir une région--" +'</option>');
        $('#region1').attr('disabled', true)
        var regionId = $(this).val();
        if(regionId) {
            
            $.ajax({
                url: '/js/' + regionId ,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    console.log(data)
                    data = data.departements
                    

                    $('#departement').empty();
                    $('#departement').removeAttr('disabled');
                    $('#departement').append('<option  value="">'+ "--Choisir un département--" +'</option>');

                    data.forEach(departement => {
                        $('#departement').append('<option value="'+ departement.id +'">'+ departement.libelle +'</option>');

                    });
                    if(data.length==0)
                    {
                        $('#departement').attr('disabled', true)

                    }

                },
                error:function() {
                    $('#departement').empty();
                    $('#departement').attr('disabled', true);
                }
            });
        } else {
            $('#departement').empty();
            $('#departement').attr('disabled', true);
            $('#departement').append('<option value="">'+ "--Choisir une région d'abord--" +'</option>');
            
        }
    });


// 2

$('#departement').on('change', function() {

    $('#departement1').html("");

    $('#departement1').append('<option  value="">'+ "--Choisir un département--" +'</option>');
    $('#departement1').attr('disabled', true)
    $('#region1').html("")
    $('#region1').append('<option value="">'+ "--Choisir une région--" +'</option>');
    $('#region1').attr('disabled', true)


    $('#region1').removeAttr('disabled');
     depId = $(this).val();


     $.ajax({
        url: 'js/create' ,
        type: "GET",
        dataType: "json",
        success:function(data) {
            console.log(data)
            
            data.forEach(departement => {
                $('#region1').append('<option value="'+ departement.id +'">'+ departement.libelle +'</option>');

            });

        },

    });













     
})




$('#departement1').innerHtml=""

$('#region1').on('change', function() {
    var regionId = $(this).val();
    if(regionId) {
        $.ajax({
            url: '/js/' + regionId ,
            type: "GET",
            dataType: "json",
            success:function(data) {
                console.log(data)
                data = data.departements

                $('#departement1').empty();
                $('#departement1').removeAttr('disabled');
                $('#departement1').append('<option  value="" >'+ "--Choisir un département--" +'</option>');

                data.forEach(departement1 => {

                    if(depId!=departement1.id)
                    {
                        $('#departement1').append('<option value="'+ departement1.id +'">'+ departement1.libelle +'</option>');
                        check = true

                    }

                    

                    

                });
                if(check==false)
                {
                    $('#departement1').html("");
                    $('#departement1').append('<option value="" >'+ "Lieu de depart et d'arrivé identique ! " +'</option>');


                }

                if(data.length==0)
                {
                    $('#departement1').attr('disabled', true)

                }

            },
            error:function() {
                $('#departement1').empty();
                $('#departement1').attr('disabled', true);
            }
        });
    } else {
        $('#departement1').empty();
        $('#departement1').attr('disabled', true);
    }


      


});



$('#tf').on('input', function() {
    
    var distance = parseInt($('#distance').val());
    if($('#tf').val() =="")
    {
        $('#tarif').val("");


    }

    var inputVal = $(this).val();


    if (/^\d+(\.\d+)?$/.test(inputVal)) {
        console.log(inputVal)

        var tarifTotal = distance * inputVal;
        $('#tarif').val(tarifTotal );


    } else {
        $(this).val(inputVal.slice(0, -1));
    }
  });









  $('#tf').on('input', function() {
    var inputVal = $(this).val();
    
    var regex = /^0[0-9]*$/;
    
    if (regex.test(inputVal)) {
      $(this).val('');
    }
  });
  

  
  $('#distance').on('input', function() {
    var inputVal = $(this).val();
    
    var regex = /^0[0-9]*$/;
    
    if (regex.test(inputVal)) {
      $(this).val('');
    }
  });
  







  $('#distance').on('input', function() {
    var inputVal = $(this).val();

    if (!(/^\d+(\.\d+)?$/.test(inputVal))) {

        $(this).val(inputVal.slice(0, -1));


    } 


    $('#tarif').val("");
    $('#tf').val("");


    if ($('#distance').val() != "")
    {
        $('#tarif').removeAttr("disabled");
        $('#tf').removeAttr("disabled");

    }else{
        $('#tarif').attr("disabled",true);
        $('#tf').attr("disabled",true);
    }




  });

















});


function deleteTrajet(id) {
    if (confirm("Êtes-vous sûr de vouloir supprimer ce trajet?")) {
        $.ajax({
            url: '/trajets/' + id,
            type: 'DELETE',
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function (response) {
                if (response.success) {
                    alert(response.message);
                    location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr) {
                alert('Une erreur s\'est produite lors de la suppression du trajet.');
            }
        });
    }
}












//---------------------------------------------------------------------------------------------------------------------------------
document.addEventListener("DOMContentLoaded", function(){
    var depId 
    var check = false 


    $('#departement_D_id').innerHtml=""
    $('#region_D_id').on('change', function() {
      //  $('#departement1').html("")


        var regionId = $(this).val();
        if(regionId) {
            
            $.ajax({
                url: '/js/' + regionId ,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    console.log(data)
                    data = data.departements
                    

                    $('#departement_D_id').empty();
                    $('#departement_D_id').removeAttr('disabled');
                    $('#departement_D_id').append('<option  value="">'+ "--Choisir un département--" +'</option>');

                    data.forEach(departement_D_id => {
                        $('#departement_D_id').append('<option value="'+ departement_D_id.id +'">'+ departement_D_id.libelle +'</option>');

                    });
                    if(data.length==0)
                    {
                        $('#departement_D_id').attr('disabled', true)

                    }

                },
                error:function() {
                    $('#departement_D_id').empty();
                    $('#departement_D_id').attr('disabled', true);
                }
            });
        } else {
            $('#departement_D_id').empty();
            $('#departement_D_id').attr('disabled', true);
            $('#departement_D_id').append('<option value="">'+ "--Choisir une région d'abord--" +'</option>');
            
        }
    });


// 2

$('#departement_D_id').on('change', function() {


     depId = $(this).val();


  













     
})




$('#departement_A_id').innerHtml=""

$('#region_A_id').on('change', function() {
    $('#departement_A_id').html("");

    $('#departement_A_id').append('<option  value="">'+ "--Choisir un département--" +'</option>');
    $('#departement_A_id').attr('disabled', true)
    var regionId = $(this).val();
    if(regionId) {
        $.ajax({
            url: '/js/' + regionId ,
            type: "GET",
            dataType: "json",
            success:function(data) {
                console.log(data)
                data = data.departements

                $('#departement_A_id').empty();
                $('#departement_A_id').removeAttr('disabled');
                $('#departement_A_id').append('<option  value="" >'+ "--Choisir un département--" +'</option>');

                data.forEach(departement_A_id => {

                    if(depId!=departement_A_id.id)
                    {
                        $('#departement_A_id').append('<option value="'+ departement_A_id.id +'">'+ departement_A_id.libelle +'</option>');
                        check = true

                    }

                    

                    

                });
                if(check==false)
                {
                    $('#departement_A_id').html("");
                    $('#departement_A_id').append('<option value="" >'+ "Lieu de depart et d'arrivé identique ! " +'</option>');


                }

                if(data.length==0)
                {
                    $('#departement_A_id').attr('disabled', true)

                }

            },
            error:function() {
                $('#departement_A_id').empty();
                $('#departement_A_id').attr('disabled', true);
            }
        });
    } else {
        $('#departement_A_id').empty();
        $('#departement_A_id').attr('disabled', true);
    }


      


});









});















// id = $('#region_D_id').val()

// id1 = $('#region_A_id').val()
// id1A = $('#departement_A_id').val()
// id1D = $('#departement_D_id').val()



// $.ajax({
//     url: '/js/' + id ,
//     type: "GET",
//     dataType: "json",
//     success:function(data) {
//         console.log("suucess")
//         data = data.departements
//         data.forEach(departement_D_id => {
//             if(departement_D_id.id !=id1D)
//             {
//                 $('#departement_D_id').append('<option value="'+ departement_D_id.id +'">'+ departement_D_id.libelle +'</option>');

//             }
//              });
//     },
// });



// $.ajax({
//     url: '/js/' + id1 ,
//     type: "GET",
//     dataType: "json",
//     success:function(data) {
//         console.log("suucess 2")
//         data = data.departements
//         data.forEach(departement_A_id => {
//             if(departement_A_id.id !=id1A)
//             {
//             $('#departement_A_id').append('<option value="'+ departement_A_id.id +'">'+ departement_A_id.libelle +'</option>');
//             }     
//         });
//     },
// });







function loadTrajet(id) {
    $('#region_D_id').empty()
    $('#region_A_id').empty()
    $('#departement_D_id').empty()
    $('#departement_A_id').empty()
    $.ajax({
      url: '/trajets/' + id,
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        trajet = data[2]
        departement = data[1]
        regions = data[0]


        trajet.chauffeurs ? $('#chauffeur').val(trajet.chauffeurs) : $('#chauffeur').val('Pas de chauffeur attribué')
        trajet.clients? $('#client').val(trajet.chauffeur) : $('#client').val('Pas de')
        $('#distance').val(trajet.distance);
        $('#tarifModif').val(trajet.tarif);

        regions.forEach(region => {
            $('#region_D_id').append('<option '+(trajet.region_D_id==region.id ? "selected" : "" )+'  value="'+ region.id +'">'+ region.libelle +'</option>');

            $('#region_A_id').append('<option '+(trajet.region_A_id==region.id ? "selected" : "" )+'  value="'+ region.id +'">'+ region.libelle +'</option>');

        });
        departement.forEach(depart =>{
            console.log(trajet.departement_D_id )
            console.log(depart.id )

            if(trajet.region_A_id==depart.region_id)
            {
                $('#departement_A_id').append('<option '+(trajet.departement_A_id==depart.id ? "selected" : "" )+'  value="'+ depart.id +'">'+ depart.libelle +'</option>');


            }

            if(trajet.region_D_id==depart.region_id)
            {
                $('#departement_D_id').append('<option '+(trajet.departement_D_id==depart.id ? "selected" : "" )+'  value="'+ depart.id +'">'+ depart.libelle +'</option>');


            }

        })

    
        
      
      }
    });
    var form = document.getElementById("modifTrajetForm");

    var submitBtn = document.getElementById("submitBtn");



  submitBtn.onclick = function(event) {
    event.preventDefault();

    
    form.action = "/trajets/"+trajet.id

    if(controls())
    form.submit();

  };
  }


  function controls() {
    distance = $('#distance').val()
    tarif = $('#tarifModif').val()

    const DistancePattern = /^0\.[1-9]\d*|[1-9]\d*(\.\d+)?$/;
    const TarifPattern = /^0\.[1-9]\d*|[1-9]\d*(\.\d+)?$/;


    if (!DistancePattern.test(distance)) {
        $('#distance_error').removeAttr("hidden")
      }else{
        $('#distance_error').attr("hidden",true)

      }


      if (!TarifPattern.test(tarif)) {
        $('#tarif_error').removeAttr("hidden")
      }else{
        $('#tarif_error').attr("hidden",true)

      }

    return (DistancePattern.test(distance) && TarifPattern.test(tarif))
   
    
  }
  


  //Ajout






  document.addEventListener("DOMContentLoaded", function(){
    setInterval(function() {
        $.ajax({
            url: window.location.href,
            type: 'GET',
            dataType: 'html',
            success: function(response) {
                var Tocharge1 = $(response).find('#Tocharge1').html();
                $('#Tocharge1').html(Tocharge1);

                var Tocharge2 = $(response).find('#Tocharge2').html();
                $('#Tocharge2').html(Tocharge2);

            }
        });
    }, 4000);
    
});





if( $('#check').val()==1)
{


//Systeme de notification pour le chauffeur
document.addEventListener("DOMContentLoaded", function(){
    notif=0
    setInterval(function() {
        $.ajax({
            url: "/chauffeurs/create",
            type: 'GET',
            
            success: function(response) {
                trajets = response[0]
                u = response[1]

                trajets.forEach(trajet => {
                    if(trajet.client_id!=null && trajet.chauffeur_id == u.id && trajet.started==0 && notif==0 &&trajet.start==0 )
                    {
                        $('#modalMessage').text("Un client vous a été attribuer ! ")
                        document.getElementById("notifBtnForModal").click();
                        notif=1

                    }
                  

                    if(trajet.client_id!=null && trajet.chauffeur_id == null && notif!=2  )
                    { 
                        console.log(trajet)

                        $('#modalTitle').text("Un client  a reserver le trajet suivant : ") 
                        $('#modalMessage').text(trajet.departement_D+"("+trajet.region_D+")"+" --> "+trajet.departement_A+"("+trajet.region_A+")")
                        document.getElementById("notifBtnForModal").click();
                        notif=2

                    }



                    


                    
                });
            
             
            }
        });
    }, 3000);
    
});

}




if( $('#check').val()==2){
//Systeme de notification pour le client
document.addEventListener("DOMContentLoaded", function(){
    notif=0
    setInterval(function() {
        $.ajax({
            url: "/clients/create",
            type: 'GET',
            
            success: function(response) {
                trajets = response[0]
                u = response[1]
                console.log(response)

                trajets.forEach(trajet => {
                    if(trajet.client_id==u.id && trajet.chauffeur_id != null && trajet.start!=1  && trajet.started==1 && trajet.endnotif==0 )
                    {  
                        $('#modalTitle').text("Course terminée ! ") 
                        document.getElementById("notifBtnForModal").click();

                        $.ajax({
                            url: "/clients/"+trajet.id,
                            type: 'GET',
                            
                            success: function(response) {

                            }
                        
                        })
                        

                    }

                    if(trajet.client_id == u.id && trajet.chauffeur_id!=null && trajet.start==0 && trajet.started==0 && notif==0){
                        $('#modalTitle').text("Un chauffeur vous a été attribuer ! ") 
                        document.getElementById("notifBtnForModal").click();
                        notif = 1
                    }
                  

                    
                });
            
             
            }
        });
    }, 3000);
    
});
}