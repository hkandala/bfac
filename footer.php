<script>
function animatebot()
        {
           $('#botpart').animate({ 
    backgroundPositionY:"100%"
}, 50000, 'linear' , function()
{
  $('#botpart').animate({ 
    backgroundPositionY:"0.5%"
}, 50000, 'linear', function()
{
  animatebot();
});
});
        }
        $(document).ready(function(e){
          var w = $(window).width();
            if(w > 768)
            animatebot();
        });
</script>
<div class="row header-background" id="botpart">
  <div class="row header-split-2 cloud-down">    
  </div>
  <div class="row header-split-1">
    <div class="columns large-4 logo small-12">
    </div> 
     <div class="large-8 columns small-12 footer-text">
       <div style="display:inline-block;float:right;margin-top:5%;margin-right:5px">
       Copyright Make-a-thon, 2013. Website by Sir C V Raman <span style="font-family:'os-l';font-size:0.6em">block</span>
       </div>
     </div>
  </div>
</div>