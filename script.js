// Exemple de fallback pour une fonctionnalité JavaScript -------------------------------->
if (!('fetch' in window)) {
  var xhr = new XMLHttpRequest();
}


// bouton pour revenir en haut de la base page ------------------------------>

/*window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("btnScrollToTop").style.display = "block";
  } else {
    document.getElementById("btnScrollToTop").style.display = "none";
  }
}

function scrollToTop() {
  document.body.scrollTop = 0; // Pour les anciens navigateurs
  document.documentElement.scrollTop = 0; // Pour les nouveaux navigateurs
}*/

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

/*----------------- GESTION DES FILTRES EN HAUT DE PAGE D'ACCUEIL -----------------------------------------------*/
document.addEventListener('DOMContentLoaded', function() {
    if (window.location.pathname === '/Atoprod.html' || window.location.pathname === '/header.php') {
        // Logique supplémentaire si nécessaire
    }
});



/*----------------- GESTION DU CLICK SOURIS -----------------------------------------------*/

document.addEventListener("DOMContentLoaded", () => {
  const cardContainers = document.querySelectorAll(".card-container");

  cardContainers.forEach((container) => {
    let isDown = false;
    let startX;
    let scrollLeft;

    container.addEventListener("mousedown", (e) => {
      isDown = true;
      container.classList.add("active");
      startX = e.pageX - container.offsetLeft;
      scrollLeft = container.scrollLeft;
    });

    container.addEventListener("mouseleave", () => {
      isDown = false;
      container.classList.remove("active");
    });

    container.addEventListener("mouseup", () => {
      isDown = false;
      container.classList.remove("active");
    });

    container.addEventListener("mousemove", (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - container.offsetLeft;
      const walk = (x - startX) * 3; // Scroll-fast
      container.scrollLeft = scrollLeft - walk;
    });
  });
});

/*----------------- GESTION DU CLICK SOURIS -----------------------------------------------*/

function clipSelected(content) {
  let url =
    "../infos_clips.json" +
    content;
  fetch(url).then((infos_clips) =>
    infos_clips.json().then((data) => {
      console.log(data);
      document.querySelector("#home").innerHTML = data.main;
      document.querySelector("#clips").innerHTML = data.main;
      document.querySelector("#originals").innerHTML = data.main;
      document.querySelector("#search").innerHTML = data.main;
      document.getElementById("card-container").style.display = "card";
    })
  );
}

function mouseOverClips() {
  for (let i = 0; i < clips.length; i++) {
    document.getElementById(content[i]).addEventListener("mouseenter", () => {
      //clipSelected(infos_clips[i]);
      document.getElementById("name").hidden = true;
    });
  }
}

function mouseOutClips() {
  for (let i = 0; i < clips.length; i++) {
    document.getElementById(content[i]).addEventListener("mouseleave", () => {
      //handleMouseOutClips();
      document.getElementById("card").hidden = false;
    });
  }
}

function handleMouseOutClips() {
  document.getElementById("card-container").style.display = "none";
}

function mouseOutInfos() {
  for (let i = 0; i < infos_clips.length; i++) {
    document
      .getElementById(content[i])
      .addEventListener("mouseleave", handleMouseOutInfos);
  }
}

function handleMouseOutInfos() {
  document.getElementById("content-section").style.display = "shows";
}

document.addEventListener(
  "info_clips.json",
  function () {
    const content = document.getElementById("filters");
  },
  false
);

// ----------------------- GESTION DES FILTRES ---------------------------------------------->
/*
document.addEventListener("DOMContentLoaded", () => {
  const cardContainer = document.getElementById("card-container", "card-container_2");
  const filtersNav = document.getElementById("filters-nav");

  async function fetchData(filter = "all") {
    try {
      const infos_clips = await fetch("../infos_clips.json");
      const data = await infos_clips.json();
      // debugger;
      if (data.Clips === localStorage.getItem("filter")) {
        return data.Clips.id[0];
      } else {
        localStorage.setItem("filter", filter);
      }
      displayCards(data, filter);
      generateFilters(data);
    } catch (error) {
      console.error("Erreur lors de la récupération des données:", error);
    }
  }

  function displayCards(data, filter) {
    cardContainer.innerHTML = "";
    const filteredData =
      filter === "all" ? data : data.filter((item) => item.category === filter);

    filteredData.forEach((item) => {
      const card = document.createElement("div");
      card.classList.add("card");
      card.innerHTML = `
                <img src="${item.image}" alt="${item.alt}">
                <h3>${item.nom}</h3>
            `;
      cardContainer.appendChild(card);
    });
  }

  function generateFilters(data) {
    const categories = ["all", ...new Set(data.map((item) => item.category))];
    filtersNav.innerHTML = categories
      .map(
        (category) =>
          `<li><button data-filter="${category}">${category}</button></li>`
      )
      .join("");

    // Gestion des événements sur les filtres
    filtersNav.querySelectorAll("button").forEach((button) => {
      button.addEventListener("click", (e) => {
        const filter = e.target.getAttribute("data-filter");
        fetchData(filter);
      });
    });
  }

  fetchData();
});

// ----------------------- GESTION DES FILTRES du MENU HEADER ---------------------------------------------->

document.addEventListener('DOMContentLoaded', () => {
  const cardContainer = document.getElementById('card-container');
  const filtersNav = document.getElementById('filters-nav');

  async function fetchData(filter = "all") {
      try {
          const response = await fetchALL("infos_clips.json"); // Mon URL d'API
          const data = await response.json();
          displayCards(data, filter);
          generateFilters(data);
      } catch (error) {
          console.error("Erreur lors de la récupération des données:", error);
      }
  }
 
  function displayCards(data, filter) {
      cardContainer.innerHTML = "card";
      const filteredData = filter === "all" ? data : data.filter(item => item.category === filter);
      
      filteredData.forEach(item => {
          const card = document.createElement("div");
          card.classList.add("card");
          card.innerHTML = `
              <img src="${item.image}" alt="${item.alt}">
              <h3>${item.nom}</h3>
          `;
          cardContainer.appendChild(card);
      });
  }

  function generateFilters(data) {
      const categories = ["all", ...new Set(data.map(item => item.category))];
      filtersNav.innerHTML = categories.map(category => 
          `<li><button data-filter="${category}">${category}</button></li>`
      ).join('');

      // Ajout des écouteurs d'événements pour les boutons de filtre
      filtersNav.querySelectorAll("button").forEach(button => {
          button.addEventListener("click", (e) => {
              const filters = e.target.getAttribute("data-filter");
              fetchData(filters);
          });
      });
  }

  fetchData();
});
*/
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
     /*   
    // Autre Fonction pour ouvrir et fermer la navigation latérale ----------------------------------------->
    document.addEventListener('DOMContentLoaded', () => {
        const sideNav = document.getElementById('sideNav');
        const openNavButton = document.getElementById('openNav');
        const closeNavButton = document.getElementById('closeBtn');

    // Ouvrir la nav
    openNavButton.addEventListener('click', () => {
        sideNav.style.display = 'block';
    });

    // Fermer la nav en cliquant sur le bouton de fermeture
    closeNavButton.addEventListener('click', () => {
        sideNav.style.display = 'none';
    });

    // Fermer la nav en cliquant en dehors de la nav
    window.addEventListener('click', (event) => {
        if (event.target !== sideNav && !sideNav.contains(event.target) && event.target !== openNavButton) {
            sideNav.style.display = 'none';
        }
    });
});
*/


// Fonctions pour la gestions des likes et des pas likes ----------------------------------------->
function likeComment(commentId) {
  fetch("like_dislike.php", {
      method: "POST",
      headers: {
          "Content-Type": "videos.php"
      },
      body: JSON.stringify({ comment_id: commentId })
  })
  .then(response => response.json())
  .then(data => {
      if (data.success) {
          location.reload();
      } else {
          alert("Erreur lors de l'ajout du like.");
      }
  });
}

function dislikeComment(commentId) {
  fetch("like_dislike.php", {
      method: "POST",
      headers: {
          "Content-Type": "videos.php"
      },
      body: JSON.stringify({ comment_id: commentId })
  })
  .then(response => response.json())
  .then(data => {
      if (data.success) {
          location.reload();
      } else {
          alert("Erreur lors de l'ajout du dislike.");
      }
  });
}

// Fonctions pour le Chargement Différé des videos ----------------------------------------->

document.addEventListener("DOMContentLoaded", function() {
    const playButtons = document.querySelectorAll(".play-btn");

    playButtons.forEach(button => {
        button.addEventListener("click", function() {
            const videoWrapper = button.parentElement;
            const videoElement = videoWrapper.querySelector("video");
            const videoSource = videoElement.querySelector("source");

            videoSource.src = button.getAttribute("data-src");
            videoElement.style.display = "block";
            videoElement.load();
            videoElement.play();

            button.style.display = "none";  // Bouton play caché
            
// ----------------- Update des vues de la video -------------------------------------------->
            const videoId = button.getAttribute("data-video-id");
              fetch("update_views.php", {
                method: "POST",
                headers: {
                    "Content-Type": "videos.php",
            },
            body: `video_id=${videoId}`
          });
      });
  });
});

// ---------------- Video ended --------------------------------------------------->

document.getElementById('video_id').addEventListener('ended',myHandler,false);
    function myHandler(e) {
        // What you want to do after the event
        let logoVideo = document.querySelector('.logo-video');
        let videoContent = document.querySelector('.videopresentation');
        logoVideo.addEventListener('click', playvideo());
        function playvideo() {
        videoContent.classList.add('visible');
        videoContent.play();
        }
    }
 

// ------------- Volet Accessibilité -------------------------------->
window.onload = function() {
  document.getElementById('background-color').value = localStorage.getItem('backgroundColor') || 'white';
  document.getElementById('audio-description').checked = localStorage.getItem('audioDescription') === 'true';
  document.getElementById('color-blind-mode').checked = localStorage.getItem('colorBlindMode') === 'true';
  document.getElementById('subtitles').value = localStorage.getItem('subtitles') || 'none';
  
  applySettings();
};

function saveSettings() {
  const backgroundColor = document.getElementById('background-color').value;
  const audioDescription = document.getElementById('audio-description').checked;
  const colorBlindMode = document.getElementById('color-blind-mode').checked;
  const subtitles = document.getElementById('subtitles').value;
  
  localStorage.setItem('backgroundColor', backgroundColor);
  localStorage.setItem('audioDescription', audioDescription);
  localStorage.setItem('colorBlindMode', colorBlindMode);
  localStorage.setItem('subtitles', subtitles);

  applySettings();
}

function applySettings() {
  const backgroundColor = localStorage.getItem('backgroundColor') || 'white';
  const colorBlindMode = localStorage.getItem('colorBlindMode') === 'true';
    /*alert('coucou')*/
  document.body.style.backgroundColor = backgroundColor;

  if (colorBlindMode) {
      document.body.classList.add('color-blind-mode');
  } else {
      document.body.classList.remove('color-blind-mode');
  }
// ---- logiques supplémentaires pour l'audio-description et les sous-titres >----------->


// ---- Gestion des Sous-titres et de l'Audio Description >-------------------------------->

  const subtitles = localStorage.getItem('subtitles') || 'none';
  const video = document.getElementById('video');
  const track = document.getElementById('subtitles-track');
  
  if (subtitles !== 'none') {
      track.src = `subtitles-${subtitles}.vtt`;
      track.srclang = subtitles;
      track.label = subtitles;
      track.default = true;
  } else {
      track.src = '';
      track.default = false;
  }

  // ici des logiques supplémentaires pour l'audio-description
}

