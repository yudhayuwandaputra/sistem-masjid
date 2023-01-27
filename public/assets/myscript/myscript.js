//  KONFIGURASI DELETE ZAKAT FITRAH.

 function deleteData(id) {

   const urlAction = $('.btn-del').data('url');
   const urlRefresh = $('.btn-del').data('refresh');
   
     swal({
       title: "Apakah kamu yakin?",
       text: "Ingin menghapus data ini",
       icon: "warning",
       buttons: true,
       dangerMode: true,
     })
     .then((willDelete) => {
       if (willDelete) {
         $.ajax({
           type:"POST",
           url: BASE_URL + urlAction,
           data:{id : id},
           success: function(){
             window.location = BASE_URL + urlRefresh  ;
           }
         });
       } else {
         swal("Oke! Lain kali pikirkan lebih dalam!",{
           icon:"info",
         });

       }
     });
   }
  // success all CRUDS Zakat Fitrah. 
  const flashData = $('.flash-data').data('flashdata');

  if(flashData){
    swal("Selamat! Data berhasil " + flashData + "!", {
      icon: "success",
    });
  }