<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  </head>
  <body>



<script>
   

    function affiche(objet)
    {
      console.log(objet);
    }


    $().ready(function(){

       $.getJSON("fic.json",function(data)
        {
          $.each(data,function(i,objet)
          {
            $("body").append("<a href='"+objet.url+"' onmouseenter=\"affiche('"+objet.location+"')\" ><img src='"+objet.url+"' alt='Smiley face' height='200' width='200'/></a>")

          })
        })
    })


   </script>



  </body>
</html>


