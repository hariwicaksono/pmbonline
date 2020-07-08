<script type="text/javascript">

			wow = new WOW(
			  {
				animateClass: 'animated',
				offset:       100,
				callback:     function() {
				 
				}
			  }
			);
			 wow.init();

	      $(".date-picker").datepicker( {
          format: " yyyy-mm-dd", // Notice the Extra space at the beginning
          autoclose: true
     		 });

	       $('.carousel').carousel({
        interval: 5000 //changes the speed
    });

	      $(document).ready( function () {
		      	$("#gulung").bootstrapNews({
				newsPerPage: 1,
				navigation: true,
	            autoplay: true,
	            direction: 'up',
	            newsTickerInterval: 3000,
	            onToDo: function () {
	                //console.log(this);
	            }
	        })
	      });
		</script>
