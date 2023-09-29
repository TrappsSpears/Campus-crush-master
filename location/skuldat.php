<div id='skuldat' >

</div>
<script>
// Function to fetch and insert content into the leftbar
function loadSkulDat() {
   var xhr = new XMLHttpRequest();
   xhr.open('GET','navlos.php?skuldat=<?php echo $getname ?>',true);

   xhr.onload =function(){
    if(this.status==200){
      var leftbarContentElement = document.getElementById('skuldat');
      leftbarContentElement.innerHTML = this.response;
    }else{
      alert('error Loading postMessage')
    }
   }
   xhr.send();  
}

// Call the function to load the content when the page loads
loadSkulDat();
</script>

<div class="home_opt" style='grid-template-columns:auto auto auto auto'>
 <a href="location.php?place=<?= $getname ?>"> <div>
   <p id='active-home'> <span <?php if($pagee == 'posts' ){?> class='active-home' <?php } ?>>Posts</span> </p>
  </div></a> 
  <a href="gallery.php?place=<?= $getname ?>"> <div>
   <p id='active-home'> <span <?php if($pagee == 'gallery' ){?> class='active-home' <?php } ?>>Gallery</span> </p>
  </div></a> 
  
  <a href="direct.php?place=<?= $getname ?>"><div>
    <p> <span <?php if($pagee == 'post_D' ){?> class='active-home' <?php } ?>>Whistle Blows</span> </p>
  </div></a> 
  <a href="homeGroups.php?place=<?= $getname ?>">  <div>
    <p> <span <?php if($pagee == 'homeGees' ){?> class='active-home' <?php } ?>> <? $getname ?>Themes</span></p> 
  </div></a>
</div>