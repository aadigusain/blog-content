$(document).ready(function()
{

  $("#categoryCat").change(function()
   
  {
       
    var cat = $(this).val();
	
	

      $.ajax

      ({

         type: "POST",

         url: "js/optionSub.php",

	  data: {cat: cat},
	  

         success: function(option)

         {

           $("#categorySub").html(option);

         }

      });
            return false;

  });
  });
  
 