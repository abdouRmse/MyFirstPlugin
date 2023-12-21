/*window.addEventListener("load",function(){

    all_links = document.querySelectorAll('ul.nav-tabs > li');

    for( i = 0; i < all_links.length; i++ ){
        all_links[i].addEventListener('click', handleLinks);
    }

    all_a = document.querySelectorAll('.nav-tabs li a');
    console.log(all_a);
    for( i = 0; i < all_a.length; i++ )
    {
        console.log(all_a[i]);
        all_a[i].addEventListener('click', handleLinks);
    }

   

    function handleLinks(event){

        document.querySelector('.nav-tabs li.active').classList.remove("active");
        document.querySelector(".tab-pane.active").classList.remove('active');

        var activate = event.currentTarget;
        var anchor = event.target;
        var activePaneID = anchor.querySelector('a').getAttribute("href");

        activate.classList.add('active');
        document.querySelector(activePaneID).classList.add('active');


    }
    

});*/

window.addEventListener("load", function () {

    var allLinks = document.querySelectorAll('ul.nav-tabs > li');
  
    for (var i = 0; i < allLinks.length; i++) {
      allLinks[i].addEventListener('click', handleLinks);
    }
  
    var allAnchors = document.querySelectorAll('.nav-tabs li a');
  
    for (var i = 0; i < allAnchors.length; i++) {
      allAnchors[i].addEventListener('click', handleAnchorClick);
    }
  
    function handleLinks(event) {
  
        // Remove active class from the previously active tab and pane
      document.querySelector('.nav-tabs li.active').classList.remove("active");
      document.querySelector(".tab-pane.active").classList.remove('active');
  
      // Add active class to the clicked tab and corresponding pane
      this.classList.add('active');
      var activePaneID = this.querySelector('a').getAttribute("href").substring(1);
      document.getElementById(activePaneID).classList.add('active');
      
    }
  
    function handleAnchorClick(event) {
      // Trigger the click on the parent li element
      event.preventDefault();
      event.stopPropagation();
      this.parentElement.click();
    }
  });
  
  