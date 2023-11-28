function openPopup() {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popup").style.display = "block";
    document.getElementById("main").style.paddingTop="1000px";
  }
  
  function closePopup() {
    document.getElementById("main").style.paddingTop="0px";
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup").style.display = "none";
  }
  