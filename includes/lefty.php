<div class="leftbar">
    <!-- LeftBar Container Here -->
    <div  id="leftbar-content">
        <!-- Content will be dynamically loaded here -->
    </div>
    <script>
// Function to fetch and insert content into the leftbar
function loadLeftbarContent() {
   var xhr = new XMLHttpRequest();
   xhr.open('POST','../includes/leftbar.php',true);

         
         // Insert the fetched content into the specified element

   xhr.onload =function(){
    if(this.status==200){
      var leftbarContentElement = document.getElementById('leftbar-content');
      leftbarContentElement.innerHTML = this.responseText;
    }else{
      alert('error')
    }
   }
   xhr.send();  
}

// Call the function to load the content when the page loads
loadLeftbarContent();
</script>