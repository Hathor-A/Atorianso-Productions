/*----------------- GESTION DU POINTER -----------------------------------------------*/
document.addEventListener("DOMContentLoaded", function(){
    let cursor = document.querySelector(".custom-cursor")
    let cursorBefore = document.querySelector(".custom-cursor-before")
    
    document.addEventListener("mousemove", function(e){
        cursor.style.left = e.clientX+"px"
        cursor.style.top = e.clientY+"px"
        cursorBefore.style.left = e.clientX+"px"
        cursorBefore.style.top = e.clientY+"px"
    })
})
/*----------------- GESTION de l'API -----------------------------------------------*/
async function callApi() {
    const url = "info_region.json";
    const fetcher = await fetch(url)
    const json = await fetcher.json()
    for (let i = 0; i < json.length; i++) {
        console.log(json[i]);
        for (let k = 0; k < depInRegions[i].length; k++) {
            document.getElementById(depInRegions[i][k]).addEventListener('mouseenter', () => {
            document.querySelector('#nom').innerHTML = json[i].nom;
            document.querySelector('#changement').innerHTML = json[i].changement;
            document.querySelector('#sources').innerHTML = json[i].sources;
            document.getElementById("infos-container").style.display = "block";
            });
        }
    }
}


/*function meteoFetch(city) {
    let url = 'https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/'+city+'?key=AX4VGZHBBBNLXD4697K5H7CGA&units=metric&lang=fr'
    fetch(url).then((response) => 
    response.json().then((data) => {
    console.log(data);
    document.querySelector('#city').innerHTML = data.address;
    document.querySelector('#temp').innerHTML = Math.trunc((data.currentConditions.temp - 32) / 1.8) + '°C';
    document.querySelector('#humidity').innerHTML = data.currentConditions.humidity + ' %';
    document.querySelector('#wind').innerHTML = data.currentConditions.windspeed + ' km/h';
    document.getElementById("meteo-container").style.display = "inline";
    })
);
}*/


function meteoFetch(city) {
        const APIKEY = 'a84ec3403ec1ab892de9baf534e31bfe';
        let url = 'https://api.openweathermap.org/data/2.5/weather?q='+city+'&appid='+APIKEY+'&units=metric&lang=fr';
        fetch(url).then((response) => 
        response.json().then((data) => {
        console.log(data);
        document.querySelector('#city').innerHTML = data.name;
        document.querySelector('#temp').innerHTML = "<i class='fas fa-thermometer-half'></i>" + Math.trunc(data.main.temp) + '°C';
        document.querySelector('#humidity').innerHTML = "<i class='fas fa-tint'></i>" + data.main.humidity + ' %';
        document.querySelector('#wind').innerHTML = "<i class='fas fa-wind'></i>" + data.wind.speed + ' km/h';
        document.getElementById("meteo-container").style.display = "block";
        })
    );
}

function mouseOverMeteo() {
    for (let i = 0; i < dep.length; i++) {
            document.getElementById(dep[i]).addEventListener('mouseenter', () => {
            meteoFetch(cities[i]);
            document.getElementById('intro').hidden = true;
        });
    }
} 

function mouseOutMeteo() {
    for (let i = 0; i < dep.length; i++) {
        document.getElementById(dep[i]).addEventListener('mouseleave', () => {
            handleMouseOutMeteo();
            document.getElementById('intro').hidden = false;
        });
    }
}

function handleMouseOutMeteo() { 
    document.getElementById('meteo-container').style.display = 'none';
}

function mouseOutInfos() {
    for (let i = 0; i < dep.length; i++) {
        document.getElementById(dep[i]).addEventListener('mouseleave', handleMouseOutInfos);
    }
}

function handleMouseOutInfos() {
    document.getElementById('infos-container').style.display = 'none';
}

// JavaScript pour rendre la zone d'affichage horizontale défilable
document.addEventListener("DOMContentLoaded", function() {
    const content = document.getElementById('content');
    
    // Fonction pour déterminer la largeur totale du contenu
    function getTotalWidth() {
      let totalWidth = 0;
      const items = content.querySelectorAll('.item');
      items.forEach(item => {
        totalWidth += item.offsetWidth;
      });
      return totalWidth;
    }
  
    // Fonction pour ajuster la largeur de la zone d'affichage
    function adjustContentWidth() {
      content.style.width = getTotalWidth() + 'px';
    }
  
    // Ajustez la largeur de la zone d'affichage lorsque la fenêtre est redimensionnée
    window.addEventListener('resize', adjustContentWidth);
    adjustContentWidth();
  });
  
  // --- > -----------------------LOGIN AREA----------------------------------------->

  // Gestion de la connexion ----------------------------------------->
  const loginForm = document.getElementById("login.php");
  if (loginForm) {
      loginForm.addEventListener("submit", (e) => {
          e.preventDefault();
          const username = e.target.username.value;
          const password = e.target.password.value;
          //  vérification réelle
          if (username === "user" && password === "password") {
              alert("Connexion réussie !");
              window.location.href = "header.php"; // Retour vers la page principale après connexion
          } else {
              alert("Nom d'utilisateur ou mot de passe incorrect.");
          }
      });
      
      
    // Fonctions pour ouvrir et fermer la navigation latérale ----------------------------------------->
    document.querySelector(".openbtn").addEventListener("click", openNav);
    document.querySelector(".closebtn").addEventListener("click", closeNav);
        }
    
        function openNav() {
            document.getElementById("side-nav").style.width = "250px";
        }
        
        function closeNav() {
            document.getElementById("side-nav").style.width = "0";
        }

  